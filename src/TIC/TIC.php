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
     * TIC constructor.
     *
     * @param string $SDKAppID
     * @param string $TICKey
     * @param int    $expires
     * @param string $privateKey
     * @param string $publicKey
     * @param string $sigVersion
     */
    public function __construct(string $SDKAppID, string $privateKey, string $publicKey, string $TICKey, int $expires = 86400, $sigVersion = 'TLSSigAPIv1')
    {
        parent::__construct($SDKAppID, $privateKey, $publicKey, $sigVersion);

        $this->client = new TICKeyHttpClient($SDKAppID, $TICKey, $expires, $this->baseUri);
    }
}
