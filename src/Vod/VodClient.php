<?php

namespace BiuBiuJun\QCloud\Vod;

use BiuBiuJun\QCloud\Kernel\AbstractClient;
use BiuBiuJun\QCloud\Kernel\HttpClient\TcHttpClient;

/**
 * Class VodClient
 *
 * @package BiuBiuJun\QCloud\Vod
 */
class VodClient extends AbstractClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://vod.tencentcloudapi.com/';

    /**
     * VodClient constructor.
     *
     * @param string $secretId
     * @param string $secretKey
     */
    public function __construct(string $secretId, string $secretKey)
    {
        $this->secretId = $secretId;
        $this->secretKey = $secretKey;
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\HttpClient\TcHttpClient
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function getClient()
    {
        if (is_null($this->client)) {
            $this->client = new TcHttpClient($this->getTcSign(), $this->baseUri);
        }

        return $this->client;
    }
}
