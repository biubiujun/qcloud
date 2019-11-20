<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Exceptions\SignatureException;

/**
 * Class WebRTCSigApi
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
class WebRTCSigApi
{
    use SigKey;

    /**
     * @var string
     */
    private $SDKAppID;

    /**
     * WebRTCSigApi constructor.
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
     * @return false|string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function base64Decode($base64)
    {
        static $replace = ['*' => '+', '-' => '/', '_' => '='];
        $string = str_replace(array_keys($replace), array_values($replace), $base64);
        $result = base64_decode($string);
        if (false == $result) {
            throw new SignatureException('base64_decode error');
        }

        return $result;
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
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function verify($data, $sig)
    {
        $ret = openssl_verify($data, $sig, $this->publicKey, 'sha256');
        if ($ret == -1) {
            throw new SignatureException(openssl_error_string());
        }

        return $ret;
    }

    /**
     * @param array $json
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function genSignContentForUserSig(array $json)
    {
        static $members = [
            'TLS.appid_at_3rd',
            'TLS.account_type',
            'TLS.identifier',
            'TLS.sdk_appid',
            'TLS.time',
            'TLS.expire_after',
        ];
        $content = '';
        foreach ($members as $member) {
            if (!isset($json[$member])) {
                throw new SignatureException('json need ' . $member);
            }
            $content .= "{$member}:{$json[$member]}\n";
        }

        return $content;
    }

    /**
     * @param array $json
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    private function genSignContentForPrivateMapKey(array $json)
    {
        static $members = [
            'TLS.appid_at_3rd',
            'TLS.account_type',
            'TLS.identifier',
            'TLS.sdk_appid',
            'TLS.time',
            'TLS.expire_after',
            'TLS.userbuf',
        ];
        $content = '';
        foreach ($members as $member) {
            if (!isset($json[$member])) {
                throw new SignatureException('json need ' . $member);
            }
            $content .= "{$member}:{$json[$member]}\n";
        }

        return $content;
    }

    /**
     * @param string $userId
     * @param int    $expire
     *
     * @return mixed
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    public function genUserSig(string $userId, int $expire = 300)
    {
        $json = [
            'TLS.account_type' => '0',
            'TLS.identifier' => (string)$userId,
            'TLS.appid_at_3rd' => '0',
            'TLS.sdk_appid' => (string)$this->SDKAppID,
            'TLS.expire_after' => (string)$expire,
            'TLS.version' => '201512300000',
            'TLS.time' => (string)time(),
        ];
        $content = $this->genSignContentForUserSig($json);
        $signature = $this->sign($content);
        $json['TLS.sig'] = base64_encode($signature);
        if ($json['TLS.sig'] === false) {
            throw new SignatureException('base64_encode error');
        }
        $json_text = json_encode($json);
        if ($json_text === false) {
            throw new SignatureException('json_encode error');
        }
        $compressed = gzcompress($json_text);
        if ($compressed === false) {
            throw new SignatureException('gzcompress error');
        }

        return $this->base64Encode($compressed);
    }

    /**
     * @param string $userId
     * @param string $roomId
     * @param int    $expire
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    public function genPrivateMapKey(string $userId, string $roomId, int $expire = 300)
    {
        //视频校验位需要用到的字段
        /*
            cVer    unsigned char/1 版本号，填0
            wAccountLen unsigned short /2   第三方自己的帐号长度
            buffAccount wAccountLen 第三方自己的帐号字符
            dwSdkAppid  unsigned int/4  sdkappid
            dwAuthId    unsigned int/4  群组号码
            dwExpTime   unsigned int/4  过期时间 （当前时间 + 有效期（单位：秒，建议300秒））
            dwPrivilegeMap  unsigned int/4  权限位
            dwAccountType   unsigned int/4  第三方帐号类型
        */
        $userbuf = pack('C1', '0'); //cVer  unsigned char/1 版本号，填0
        $userbuf .= pack('n', strlen($userId)); //wAccountLen   unsigned short /2   第三方自己的帐号长度
        $userbuf .= pack('a' . strlen($userId), $userId); //buffAccount   wAccountLen 第三方自己的帐号字符
        $userbuf .= pack('N', $this->SDKAppID); //dwSdkAppid    unsigned int/4  sdkappid
        $userbuf .= pack('N', $roomId); //dwAuthId  unsigned int/4  群组号码/音视频房间号
        $userbuf .= pack('N', time() + $expire); //dwExpTime unsigned int/4  过期时间 （当前时间 + 有效期（单位：秒，建议300秒））
        $userbuf .= pack('N', hexdec("0xff")); //dwPrivilegeMap unsigned int/4  权限位
        $userbuf .= pack('N', 0); //dwAccountType  unsigned int/4  第三方帐号类型
        $json = [
            'TLS.account_type' => '0',
            'TLS.identifier' => (string)$userId,
            'TLS.appid_at_3rd' => '0',
            'TLS.sdk_appid' => (string)$this->SDKAppID,
            'TLS.expire_after' => (string)$expire,
            'TLS.version' => '201512300000',
            'TLS.time' => (string)time(),
            'TLS.userbuf' => base64_encode($userbuf),
        ];
        $content = $this->genSignContentForPrivateMapKey($json);
        $signature = $this->sign($content);
        $json['TLS.sig'] = base64_encode($signature);
        if ($json['TLS.sig'] === false) {
            throw new SignatureException('base64_encode error');
        }
        $json_text = json_encode($json);
        if ($json_text === false) {
            throw new SignatureException('json_encode error');
        }
        $compressed = gzcompress($json_text);
        if ($compressed === false) {
            throw new SignatureException('gzcompress error');
        }

        return $this->base64Encode($compressed);
    }

    /**
     * @param string $userSig
     * @param string $userId
     * @param int    $initTime
     * @param int    $expireTime
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verifyUserSig(string $userSig, string $userId, &$initTime, &$expireTime, &$errorMsg)
    {
        try {
            $errorMsg = '';
            $decoded_sig = $this->base64Decode($userSig);
            $uncompressed_sig = gzuncompress($decoded_sig);
            if ($uncompressed_sig === false) {
                throw new SignatureException('gzuncompress error');
            }
            $json = json_decode($uncompressed_sig);
            if ($json == false) {
                throw new SignatureException('json_decode error');
            }
            $json = (array)$json;
            if ($json['TLS.identifier'] !== $userId) {
                throw new SignatureException("userid error sigid:{$json['TLS.identifier']} id:{$userId}");
            }
            if ($json['TLS.sdk_appid'] != $this->SDKAppID) {
                throw new SignatureException("sdkappid error sigappid:{$json['TLS.sdk_appid']} thisappid:{$this->SDKAppID}");
            }
            $content = $this->genSignContentForUserSig($json);
            $signature = base64_decode($json['TLS.sig']);
            if ($signature == false) {
                throw new SignatureException('userSig json_decode error');
            }
            $success = $this->verify($content, $signature);
            if (!$success) {
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

    /**
     * @param string $privateMapKey
     * @param string $userId
     * @param int    $initTime
     * @param int    $expireTime
     * @param string $userBuf
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verifyPrivateMapKey($privateMapKey, $userId, &$initTime, &$expireTime, &$userBuf, &$errorMsg)
    {
        try {
            $errorMsg = '';
            $decoded_sig = $this->base64Decode($privateMapKey);
            $uncompressed_sig = gzuncompress($decoded_sig);
            if ($uncompressed_sig === false) {
                throw new SignatureException('gzuncompress error');
            }
            $json = json_decode($uncompressed_sig);
            if ($json == false) {
                throw new SignatureException('json_decode error');
            }
            $json = (array)$json;
            if ($json['TLS.identifier'] !== $userId) {
                throw new SignatureException("userid error sigid:{$json['TLS.identifier']} id:{$userId}");
            }
            if ($json['TLS.sdk_appid'] != $this->SDKAppID) {
                throw new SignatureException("sdkappid error sigappid:{$json['TLS.sdk_appid']} thisappid:{$this->SDKAppID}");
            }
            $content = $this->genSignContentForPrivateMapKey($json);
            $signature = base64_decode($json['TLS.sig']);
            if ($signature == false) {
                throw new SignatureException('sig json_decode error');
            }
            $success = $this->verify($content, $signature);
            if (!$success) {
                throw new SignatureException('verify failed');
            }
            $initTime = $json['TLS.time'];
            $expireTime = $json['TLS.expire_after'];
            $userBuf = base64_decode($json['TLS.userbuf']);

            return true;
        } catch (SignatureException $ex) {
            $errorMsg = $ex->getMessage();

            return false;
        }
    }
}
