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
    private function base64UrlEncode($string)
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
    private function base64UrlDecode($base64)
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
     * @param int $currTime
     * @param int $expire
     *
     * @return string
     */
    private function hmacsha256($identifier, $currTime, $expire)
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
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    public function generate(string $identifier, int $expire = 15552000)
    {
        $currTime = time();
        $sigArray = [
            'TLS.ver' => '2.0',
            'TLS.identifier' => strval($identifier),
            'TLS.sdkappid' => intval($this->SDKAppID),
            'TLS.expire' => intval($expire),
            'TLS.time' => intval($currTime),
        ];
        $sigArray['TLS.sig'] = $this->hmacsha256($identifier, $currTime, $expire);
        if (false === $sigArray['TLS.sig']) {
            throw new SignatureException('base64_encode error');
        }
        $jsonStrSig = json_encode($sigArray);
        if (false === $jsonStrSig) {
            throw new SignatureException('json_encode error');
        }
        $compressed = gzcompress($jsonStrSig);
        if (false === $compressed) {
            throw new SignatureException('gzcompress error');
        }

        return $this->base64UrlEncode($compressed);
    }

    /**
     * @param string $sig
     * @param string $identifier
     * @param string $initTime
     * @param string $expireTime
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verify(string $sig, string $identifier, &$initTime, &$expireTime, &$errorMsg)
    {
        try {
            $errorMsg = '';
            $compressedSig = $this->base64UrlDecode($sig);
            $preLevel = error_reporting(E_ERROR);
            $uncompressedSig = gzuncompress($compressedSig);
            error_reporting($preLevel);
            if (false === $uncompressedSig) {
                throw new SignatureException('gzuncompress error');
            }
            $sigDoc = json_decode($uncompressedSig);
            if (false == $sigDoc) {
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
            if (false == $sig) {
                throw new SignatureException('sig field is missing');
            }
            $initTime = $sigDoc['TLS.time'];
            $expireTime = $sigDoc['TLS.expire'];
            $currTime = time();
            if ($currTime > $initTime + $expireTime) {
                throw new SignatureException('sig expired');
            }
            $sigCalculated = $this->hmacsha256($identifier, $initTime, $expireTime);
            if ($sig != $sigCalculated) {
                throw new SignatureException('verify failed');
            }

            return true;
        } catch (SignatureException $ex) {
            $errorMsg = $ex->getMessage();

            return false;
        }
    }
}