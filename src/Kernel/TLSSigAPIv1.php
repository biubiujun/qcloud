<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Exceptions\InvalidConfigException;
use BiuBiuJun\QCloud\Exceptions\SignatureException;
use BiuBiuJun\QCloud\Kernel\Contracts\TLSSigAPIInterface;

/**
 * Class TLSSigAPIv1
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
class TLSSigAPIv1 implements TLSSigAPIInterface
{
    /**
     * @var string
     */
    private $SDKAppID;

    /**
     * @var string|bool
     */
    protected $privateKey = false;

    /**
     * @var bool
     */
    protected $isSetPrivateKey = false;

    /**
     * @var string|bool
     */
    protected $publicKey = false;

    /**
     * @var bool
     */
    protected $isSetPublicKey = false;

    /**
     * SigV1 constructor.
     *
     * @param string $SDKAppID
     * @param string $privateKey
     * @param string $publicKey
     */
    public function __construct(string $SDKAppID, string $privateKey, string $publicKey)
    {
        if (!extension_loaded('openssl')) {
            trigger_error('need openssl extension', E_USER_ERROR);
        }
        if (!in_array('sha256', openssl_get_md_methods(), true)) {
            trigger_error('need openssl support sha256', E_USER_ERROR);
        }
        $this->SDKAppID = $SDKAppID;
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
    }

    /**
     * @return bool
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     */
    public function setPrivateKey()
    {
        if (false === $this->isSetPrivateKey) {
            if (is_file($this->privateKey)) {
                $privateKey = "file://{$this->privateKey}";
            } else {
                $key = wordwrap($this->privateKey, 64, "\n", true);
                $privateKey = "-----BEGIN PRIVATE KEY-----\n{$key}\n-----END PRIVATE KEY-----";
            }

            $this->privateKey = openssl_pkey_get_private($privateKey);
            if (false === $this->privateKey) {
                throw new InvalidConfigException(openssl_error_string());
            }
            $this->isSetPrivateKey = true;
        }

        return true;
    }

    /**
     * @return bool
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     */
    public function setPublicKey()
    {
        if (false === $this->isSetPublicKey) {
            if (is_file($this->publicKey)) {
                $publicKey = "file://{$this->publicKey}";
            } else {
                $key = wordwrap($this->privateKey, 64, "\n", true);
                $publicKey = "-----BEGIN PUBLIC KEY-----\n{$key}\n-----END PUBLIC KEY-----";
            }

            $this->publicKey = openssl_pkey_get_public($publicKey);
            if (false === $this->publicKey) {
                throw new InvalidConfigException(openssl_error_string());
            }
            $this->isSetPublicKey = true;
        }

        return true;
    }

    /**
     * @param string $string
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function base64Encode($string)
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
    private function base64Decode($base64)
    {
        $replace = ['+' => '*', '/' => '-', '=' => '_'];
        $string = str_replace(array_values($replace), array_keys($replace), $base64);
        $result = base64_decode($string);
        if (false == $result) {
            throw new SignatureException('base64_decode error');
        }

        return $result;
    }

    /**
     * @param array $json
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function genSignContent(array $json)
    {
        $content = '';
        $aid3rd = 'TLS.appid_at_3rd';
        if (isset($json[$aid3rd])) {
            $content .= "{$aid3rd}:{$json[$aid3rd]}\n";
        }
        $members = [
            'TLS.account_type',
            'TLS.identifier',
            'TLS.sdk_appid',
            'TLS.time',
            'TLS.expire_after',
        ];
        foreach ($members as $member) {
            if (!isset($json[$member])) {
                throw new SignatureException('json need ' . $member);
            }
            $content .= "{$member}:{$json[$member]}\n";
        }

        return $content;
    }

    /**
     * @param string $data
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function sign($data)
    {
        $this->setPrivateKey();
        $signature = '';
        if (!openssl_sign($data, $signature, $this->privateKey, 'sha256')) {
            throw new SignatureException(openssl_error_string());
        }

        return $signature;
    }

    /**
     * @param string $data
     * @param string $sig
     *
     * @return int
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function opensslVerify($data, $sig)
    {
        $this->setPublicKey();
        $ret = openssl_verify($data, $sig, $this->publicKey, 'sha256');
        if (-1 == $ret) {
            throw new SignatureException(openssl_error_string());
        }

        return $ret;
    }

    /**
     * @param string $identifier
     * @param int    $expire
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    public function generate(string $identifier, int $expire = 15552000)
    {
        $json = [
            'TLS.account_type' => '0',
            'TLS.identifier' => (string)$identifier,
            'TLS.appid_at_3rd' => '0',
            'TLS.sdk_appid' => (string)$this->SDKAppID,
            'TLS.expire_after' => (string)$expire,
            'TLS.version' => '201512300000',
            'TLS.time' => (string)time(),
        ];
        $content = $this->genSignContent($json);
        $signature = $this->sign($content);
        $json['TLS.sig'] = base64_encode($signature);
        if (false === $json['TLS.sig']) {
            throw new SignatureException('base64_encode error');
        }
        $jsonText = json_encode($json);
        if (false === $jsonText) {
            throw new SignatureException('json_encode error');
        }
        $compressed = gzcompress($jsonText);
        if (false === $compressed) {
            throw new SignatureException('gzcompress error');
        }

        return $this->base64Encode($compressed);
    }

    /**
     * @param string $sig
     * @param string $identifier
     * @param string $initTime
     * @param string $expireTime
     * @param string $errorMsg
     *
     * @return bool
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     */
    public function verify(string $sig, string $identifier, &$initTime, &$expireTime, &$errorMsg)
    {
        try {
            $errorMsg = '';
            $decodedSig = $this->base64Decode($sig);
            $uncompressedSig = gzuncompress($decodedSig);
            if (false === $uncompressedSig) {
                throw new SignatureException('gzuncompress error');
            }
            $json = json_decode($uncompressedSig);
            if (false == $json) {
                throw new SignatureException('json_decode error');
            }
            $json = (array)$json;
            if ($json['TLS.identifier'] !== $identifier) {
                throw new SignatureException("identifier error sigid:{$json['TLS.identifier']} id:{$identifier}");
            }
            if ($json['TLS.sdk_appid'] != $this->SDKAppID) {
                throw new SignatureException("appid error sigappid:{$json['TLS.appid']} thisappid:{$this->SDKAppID}");
            }
            $content = $this->genSignContent($json);
            $signature = base64_decode($json['TLS.sig']);
            if (false == $signature) {
                throw new SignatureException('sig json_decode error');
            }
            $succ = $this->opensslVerify($content, $signature);
            if (!$succ) {
                throw new SignatureException('verify failed');
            }
            $initTime = $json['TLS.time'];
            $expireTime = $json['TLS.expire_after'];

            return true;
        } catch (SignatureException $ex) {
            $errorMsg = $ex->getMessage();

            return false;
        }
    }
}
