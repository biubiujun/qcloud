<?php

namespace BiuBiuJun\QCloud\Kernel\HttpClient;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Trait SendRequest
 *
 * @package BiuBiuJun\QCloud\Kernel\HttpClient
 */
trait SendRequest
{
    /**
     * @var \BiuBiuJun\QCloud\Kernel\HttpClient\HttpClient
     */
    protected $client;

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest $request
     * @param array                                $options
     * @param bool                                 $isAsync
     *
     * @return \BiuBiuJun\QCloud\Kernel\BaseResponse
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function sendRequest(BaseRequest $request, array $options = [], $isAsync = false)
    {
        $responseApplication = str_replace('Request', 'Response', get_class($request));
        if (!class_exists($responseApplication)) {
            throw new InvalidArgumentException("Response Class {$responseApplication} not exist.");
        }
        $response = new $responseApplication();

        if (false === $isAsync) {
            return $this->getClient()->request($request, $response, $options);
        } else {
            return $this->getClient()->requestAsync($request, $options);
        }
    }
}
