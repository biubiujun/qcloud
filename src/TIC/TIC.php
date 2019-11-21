<?php

namespace BiuBiuJun\QCloud\TIC;

use BiuBiuJun\QCloud\Kernel\HttpClient\TICKeyHttpClient;
use BiuBiuJun\QCloud\Tencent;

/**
 * Class TIC
 * @package BiuBiuJun\QCloud\TIC
 */
class TIC extends Tencent
{
    /**
     * @var string
     */
    protected $baseUri = 'https://iclass.api.qcloud.com/';

    /**
     * @var \BiuBiuJun\QCloud\Kernel\HttpClient\TICKeyHttpClient
     */
    protected $client;

    /**
     * TIC constructor.
     *
     * @param string $SDKAppID
     * @param string $TICKey
     * @param int    $expires
     */
    public function __construct(string $SDKAppID, string $TICKey, int $expires = 86400)
    {
        $this->client = new TICKeyHttpClient($SDKAppID, $TICKey, $expires, $this->baseUri);
    }   
}