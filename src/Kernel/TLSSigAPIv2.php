<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Exceptions\SignatureException;
use BiuBiuJun\QCloud\Kernel\Contracts\TLSSigAPIInterface;

/**
 * Class TLSSigAPIv2
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
class TLSSigAPIv2 implements TLSSigAPIInterface
{
    /**
     * @var string
     */
    protected $SDKAppID;

    /**
     * @var string|bool
     */
    protected $key = false;

    /**
     * TLSSigAPIv2 constructor.
     *
     * @param string $SDKAppID
     * @param string $key
     */
    public function __construct(string $SDKAppID, string $key)
    {
        $this->SDKAppID = $SDKAppID;
        $this->key = $key;
    }

    /**
     * @param string $string
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function base64UrlEncode(string $string)
    {
        $replace = ['+' => '*', '/' => '-', '=' => '_'];
        $base64 = base64_encode($string);
        if (false === $base64) {
            throw new SignatureException('base64_encode error');
        }

        return str_replace(array_keys($replace), array_values($replace), $base64);
    }

    /**
     * @param string $base64
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function base64UrlDecode(string $base64)
    {
        static $replace = ['+' => '*', '/' => '-', '=' => '_'];
        $string = str_replace(array_values($replace), array_keys($replace), $base64);
        $result = base64_decode($string);
        if (false == $result) {
            throw new SignatureException('base64_url_decode error');
        }

        return $result;
    }

    /**
     * @param string $identifier
     * @param int    $currTime
     * @param int    $expire
     * @param string $base64UserBuf
     * @param string $userBufEnabled
     *
     * @return string
     */
    private function hmacsha256(string $identifier, int $currTime, int $expire, string $base64UserBuf, string $userBufEnabled)
    {
        $contentToBeSigned = "TLS.identifier:" . $identifier . "\n"
            . "TLS.sdkappid:" . $this->SDKAppID . "\n"
            . "TLS.time:" . $currTime . "\n"
            . "TLS.expire:" . $expire . "\n";

        return base64_encode(hash_hmac('sha256', $contentToBeSigned, $this->key, true));
    }

    /**
     * @param string $identifier
     * @param int    $expire
     * @param string $userBuf
     * @param string $userBufEnabled
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function __genSig(string $identifier, int $expire, string $userBuf, string $userBufEnabled)
    {
        $currTime = time();
        $sigArray = [
            'TLS.ver' => '2.0',
            'TLS.identifier' => strval($identifier),
            'TLS.sdkappid' => intval($this->SDKAppID),
            'TLS.expire' => intval($expire),
            'TLS.time' => intval($currTime),
        ];
        $base64UserBuf = '';
        if (true == $userBufEnabled) {
            $base64UserBuf = base64_encode($userBuf);
            $sigArray['TLS.userbuf'] = strval($base64UserBuf);
        }
        $sigArray['TLS.sig'] = $this->hmacsha256($identifier, $currTime, $expire, $base64UserBuf, $userBufEnabled);
        if ($sigArray['TLS.sig'] === false) {
            throw new SignatureException('base64_encode error');
        }
        $json_str_sig = json_encode($sigArray);
        if ($json_str_sig === false) {
            throw new SignatureException('json_encode error');
        }
        $compressed = gzcompress($json_str_sig);
        if ($compressed === false) {
            throw new SignatureException('gzcompress error');
        }

        return $this->base64UrlEncode($compressed);
    }

    /**
     * @param string $identifier
     * @param int    $expire
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    public function genSig(string $identifier, int $expire = 15552000)
    {
        return $this->__genSig($identifier, $expire, '', false);
    }

    /**
     * @param string $identifier
     * @param string $userBuf
     * @param int    $expire
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    public function genSigWithUserBuf(string $identifier, string $userBuf, int $expire = 15552000)
    {
        return $this->__genSig($identifier, $expire, $userBuf, true);
    }

    /**
     * @param string $sig
     * @param string $identifier
     * @param string $initTime
     * @param string $expireTime
     * @param string $userBuf
     * @param string $errorMsg
     *
     * @return bool
     */
    public function __verifySig(string $sig, string $identifier, &$initTime, &$expireTime, &$userBuf, &$errorMsg)
    {
        try {
            $errorMsg = '';
            $compressedSig = $this->base64UrlDecode($sig);
            $preLevel = error_reporting(E_ERROR);
            $uncompressedSig = gzuncompress($compressedSig);
            error_reporting($preLevel);
            if ($uncompressedSig === false) {
                throw new SignatureException('gzuncompress error');
            }
            $sigDoc = json_decode($uncompressedSig);
            if ($sigDoc == false) {
                throw new SignatureException('json_decode error');
            }
            $sigDoc = (array)$sigDoc;
            if ($sigDoc['TLS.identifier'] !== $identifier) {
                throw new SignatureException("identifier dosen't match");
            }
            if ($sigDoc['TLS.sdkappid'] != $this->SDKAppID) {
                throw new SignatureException("sdkappid dosen't match");
            }
            $sig = $sigDoc['TLS.sig'];
            if ($sig == false) {
                throw new SignatureException('sig field is missing');
            }
            $initTime = $sigDoc['TLS.time'];
            $expireTime = $sigDoc['TLS.expire'];
            $currTime = time();
            if ($currTime > $initTime + $expireTime) {
                throw new SignatureException('sig expired');
            }
            $userBufEnabled = false;
            $base64UserBuf = '';
            if (isset($sigDoc['TLS.userbuf'])) {
                $base64UserBuf = $sigDoc['TLS.userbuf'];
                $userBuf = base64_decode($base64UserBuf);
                $userBufEnabled = true;
            }
            $sigCalculated = $this->hmacsha256($identifier, $initTime, $expireTime, $base64UserBuf, $userBufEnabled);
            if ($sig != $sigCalculated) {
                throw new SignatureException('verify failed');
            }

            return true;
        } catch (SignatureException $ex) {
            $errorMsg = $ex->getMessage();

            return false;
        }
    }

    /**
     * @param string $sig
     * @param string $identifier
     * @param int    $initTime
     * @param int    $expireTime
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verifySig(string $sig, string $identifier, &$initTime, &$expireTime, &$errorMsg)
    {
        $userBuf = '';

        return $this->__verifySig($sig, $identifier, $init_time, $expire_time, $userBuf, $error_msg);
    }

    /**
     * @param string $sig
     * @param string $identifier
     * @param int    $initTime
     * @param int    $expireTime
     * @param string $userBuf
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verifySigWithUserBuf(string $sig, string $identifier, &$initTime, &$expireTime, &$userBuf, &$errorMsg)
    {
        return $this->__verifySig($sig, $identifier, $initTime, $expireTime, $userBuf, $errorMsg);
    }
}