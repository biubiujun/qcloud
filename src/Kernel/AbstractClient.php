<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Kernel\Contracts\TlsSignInterface;
use BiuBiuJun\QCloud\Kernel\HttpClient\SendRequest;
use BiuBiuJun\QCloud\Kernel\Sign\TcSign;
use BiuBiuJun\QCloud\Kernel\Sign\TicSign;
use BiuBiuJun\QCloud\Kernel\Sign\TlsSignV1;
use BiuBiuJun\QCloud\Kernel\Sign\TlsSignV2;

/**
 * Class AbstractClient
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
abstract class AbstractClient
{
    use SendRequest;

    /**
     * @var string
     */
    protected $sdkAppId;

    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $privateKey;

    /**
     * @var string
     */
    protected $publicKey;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $sigVersion;

    /**
     * @var string
     */
    protected $ticKey;

    /**
     * @var string
     */
    protected $secretId;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var \BiuBiuJun\QCloud\Kernel\Contracts\TlsSignInterface
     */
    protected $tlsSign = null;

    /**
     * @var \BiuBiuJun\QCloud\Kernel\Sign\TcSign
     */
    protected $tcSign = null;

    /**
     * @var \BiuBiuJun\QCloud\Kernel\HttpClient\HttpClient
     */
    protected $client = null;

    /**
     * @param string $privateKey
     * @param string $publicKey
     */
    public function setSignForEcdsa(string $privateKey, string $publicKey)
    {
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
        $this->sigVersion = 'V1';
    }

    /**
     * @param string $key
     */
    public function setSignForHmac(string $key)
    {
        $this->key = $key;
        $this->sigVersion = 'V2';
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\Contracts\TlsSignInterface
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function getTlsSign()
    {
        if (!$this->tlsSign instanceof TlsSignInterface) {
            if (empty($this->sdkAppId)) {
                throw new InvalidArgumentException('sdkAppId is empty.');
            }
            if ('V1' == $this->sigVersion) {
                if (empty($this->privateKey)) {
                    throw new InvalidArgumentException('privateKey is empty.');
                }
                if (empty($this->publicKey)) {
                    throw new InvalidArgumentException('publicKey is empty.');
                }
                $this->tlsSign = new TlsSignV1($this->sdkAppId, $this->privateKey, $this->publicKey);
            } elseif ('V2' == $this->sigVersion) {
                if (empty($this->key)) {
                    throw new InvalidArgumentException('key is empty.');
                }
                $this->tlsSign = new TlsSignV2($this->sdkAppId, $this->key);
            } else {
                throw new InvalidArgumentException("Sign Version {$this->sigVersion} not exist.");
            }
        }

        return $this->tlsSign;
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\Sign\TcSign
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function getTcSign()
    {
        if (!$this->tcSign instanceof TcSign) {
            if (empty($this->secretId)) {
                throw new InvalidArgumentException('secretId is empty.');
            }
            if (empty($this->secretKey)) {
                throw new InvalidArgumentException('secretKey is empty.');
            }

            $this->tcSign = new TcSign($this->secretId, $this->secretKey);
        }

        return $this->tcSign;
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\HttpClient\HttpClient
     */
    abstract public function getClient();

    /**
     * @param string $identifier
     * @param int    $ttl
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function genUserSign(string $identifier, $ttl = 5184000)
    {
        return $this->getTlsSign()->sign($identifier, $ttl);
    }

    /**
     * @param string $userId
     * @param string $roomId
     * @param int    $expire
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
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
        $userBuf = pack('C1', '0'); //cVer  unsigned char/1 版本号，填0
        $userBuf .= pack('n', strlen($userId)); //wAccountLen   unsigned short /2   第三方自己的帐号长度
        $userBuf .= pack('a' . strlen($userId), $userId); //buffAccount   wAccountLen 第三方自己的帐号字符
        $userBuf .= pack('N', $this->sdkAppId); //dwSdkAppid    unsigned int/4  sdkappid
        $userBuf .= pack('N', $roomId); //dwAuthId  unsigned int/4  群组号码/音视频房间号
        $userBuf .= pack('N', time() + $expire); //dwExpTime unsigned int/4  过期时间 （当前时间 + 有效期（单位：秒，建议300秒））
        $userBuf .= pack('N', hexdec("0xff")); //dwPrivilegeMap unsigned int/4  权限位
        $userBuf .= pack('N', 0); //dwAccountType  unsigned int/4  第三方帐号类型

        return $this->getTlsSign()->sign($userId, $expire, $userBuf);
    }
}
