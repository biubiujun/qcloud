<?php

namespace BiuBiuJun\QCloud;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class Tencent
 * @package BiuBiuJun\QCloud
 */
class Tencent
{
    /**
     * @var \BiuBiuJun\QCloud\Kernel\HttpClient\TLSSigHttpClient
     */
    protected $client;

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest $request
     * @param bool                                 $isAsync
     *
     * @return \BiuBiuJun\QCloud\Kernel\BaseResponse
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function sendRequest(BaseRequest $request, $isAsync = false)
    {
        $responseApplication = str_replace('Request', 'Response', get_class($request));
        if (!class_exists($responseApplication)) {
            throw new InvalidArgumentException("Response Class {$responseApplication} not exist.");
        }
        $response = new $responseApplication();

        if (false === $isAsync) {
            return $this->client->request($request, $response);
        } else {
            return $this->client->requestAsync($request);
        }
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\HttpClient\TLSSigHttpClient
     */
    public function getClient()
    {
        return $this->client;
    }
}
