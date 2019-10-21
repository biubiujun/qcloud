<?php

namespace BiuBiuJun\QCloud\TIM;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class Tim
 *
 * @package BiuBiuJun\QCloud\Tim
 */
class TIM
{
    /**
     * @var string
     */
    protected $baseUri = 'https://console.tim.qq.com/';

    /**
     * @var \BiuBiuJun\QCloud\Kernel\Contracts\TLSSigAPIInterface
     */
    protected $signature;

    /**
     * @var \BiuBiuJun\QCloud\TIM\HttpClient
     */
    protected $client;

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

        $this->signature = new $sigApplication($SDKAppID, $privateKey, $publicKey);
        $this->client = new HttpClient($SDKAppID, $identifier, $this->signature, $this->baseUri);
    }

    /**
     * @param string $identifier
     * @param int    $ttl
     *
     * @return string
     */
    public function getUserSig(string $identifier, $ttl = 5184000)
    {
        return $this->signature->genSig($identifier, $ttl);
    }

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest $request
     *
     * @return \BiuBiuJun\QCloud\Kernel\BaseResponse
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest(BaseRequest $request)
    {
        $responseApplication = str_replace('Request', 'Response', get_class($request));
        if (!class_exists($responseApplication)) {
            throw new InvalidArgumentException("Response Class {$responseApplication} not exist.");
        }
        $response = new $responseApplication();

        return $this->client->request($request, $response);
    }
}
