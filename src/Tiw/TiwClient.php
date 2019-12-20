<?php

namespace BiuBiuJun\QCloud\Tiw;

use BiuBiuJun\QCloud\Kernel\AbstractClient;
use BiuBiuJun\QCloud\Kernel\HttpClient\TcHttpClient;

class TiwClient extends AbstractClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://tiw.tencentcloudapi.com/';

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
        if (!$this->client instanceof TcHttpClient) {
            $this->client = new TcHttpClient($this->getTcSign(), $this->baseUri);
        }

        return $this->client;
    }
}
