<?php

namespace BiuBiuJun\QCloud\TIM;

use BiuBiuJun\QCloud\Kernel\HttpClient\TLSSigHttpClient;
use BiuBiuJun\QCloud\Kernel\WebRTCSigApi;
use BiuBiuJun\QCloud\Tencent;

/**
 * Class TIM
 * @package BiuBiuJun\QCloud\TIM
 */
class TIM extends Tencent
{
    /**
     * @var string
     */
    protected $baseUri = 'https://console.tim.qq.com/';

    /**
     * @var \BiuBiuJun\QCloud\Kernel\Contracts\TLSSigAPIInterface
     */
    protected $tlsSignature;

    /**
     * @var \BiuBiuJun\QCloud\Kernel\WebRTCSigApi
     */
    protected $rtcSignature;

    /**
     * TIM constructor.
     *
     * @param string $SDKAppID
     * @param string $identifier
     * @param string $privateKey
     * @param string $publicKey
     * @param string $sigVersion
     */
    public function __construct(string $SDKAppID, string $identifier, string $privateKey, string $publicKey, $sigVersion = 'TLSSigAPIv1')
    {
        $sigApplication = "BiuBiuJun\\QCloud\\Kernel\\$sigVersion";

        $this->tlsSignature = new $sigApplication($SDKAppID, $privateKey, $publicKey);
        $this->rtcSignature = new WebRTCSigApi($SDKAppID, $privateKey, $publicKey);
        $this->client = new TLSSigHttpClient($SDKAppID, $identifier, $this->tlsSignature, $this->baseUri);
    }

    /**
     * @param string $identifier
     * @param int    $ttl
     *
     * @return string
     */
    public function getUserSig(string $identifier, $ttl = 5184000)
    {
        return $this->tlsSignature->genSig($identifier, $ttl);
    }

    /**
     * @param string $identifier
     * @param string $roomId
     * @param int    $expire
     *
     * @return string
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     * @throws \BiuBiuJun\QCloud\Exceptions\SignatureException
     */
    public function getPrivateMapKey(string $identifier, string $roomId, int $expire = 300)
    {
        return $this->rtcSignature->genPrivateMapKey($identifier, $roomId, $expire);
    }
}
