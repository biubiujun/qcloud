<?php

namespace BiuBiuJun\QCloud\Tim;

use BiuBiuJun\QCloud\Kernel\AbstractClient;
use BiuBiuJun\QCloud\Kernel\HttpClient\TlsSigHttpClient;

/**
 * Class TimClient
 *
 * @package BiuBiuJun\QCloud\Tim
 */
class TimClient extends AbstractClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://console.tim.qq.com/';

    /**
     * TimClient constructor.
     *
     * @param string $sdkAppId
     * @param string $identifier
     * @param string $privateKey
     * @param string $publicKey
     * @param string $sigVersion
     */
    public function __construct(string $sdkAppId, string $identifier, string $privateKey, string $publicKey, $sigVersion = 'V1')
    {
        $this->sdkAppId = $sdkAppId;
        $this->identifier = $identifier;
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
        $this->sigVersion = $sigVersion;
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\HttpClient\TlsSigHttpClient
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function getClient()
    {
        if (!$this->client instanceof TlsSigHttpClient) {
            $this->client = new TlsSigHttpClient($this->sdkAppId, $this->identifier, $this->getTlsSign(), $this->baseUri);
        }

        return $this->client;
    }
}
