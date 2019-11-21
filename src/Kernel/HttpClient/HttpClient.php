<?php

namespace BiuBiuJun\QCloud\Kernel\HttpClient;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Kernel\BaseResponse;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

abstract class HttpClient
{
    const MAX_RETRIES = 3;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        if (!$this->httpClient instanceof ClientInterface) {
            $handlerStack = HandlerStack::create(new CurlHandler());
            $handlerStack->push(Middleware::retry($this->retryDecider(), $this->retryDelay()));

            $this->httpClient = new Client([
                'base_uri' => $this->baseUri,
                'handler' => $handlerStack,
            ]);
        }

        return $this->httpClient;
    }

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest  $request
     * @param \BiuBiuJun\QCloud\Kernel\BaseResponse $response
     *
     * @return \BiuBiuJun\QCloud\Kernel\BaseResponse
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     */
    public function request(BaseRequest $request, BaseResponse $response): BaseResponse
    {
        $resp = $this->getHttpClient()->post($request->getUri(), $this->options($request));
        $response->handle($resp);

        return $response;
    }

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest $request
     *
     * @return mixed
     */
    public function requestAsync(BaseRequest $request)
    {
        return $this->getHttpClient()->postAsync($request->getUri(), $this->options($request));
    }

    /**
     * @return \Closure
     */
    protected function retryDecider()
    {
        return function (
            $retries,
            Request $request,
            Response $response = null,
            RequestException $exception = null
        ) {
            if ($retries >= self::MAX_RETRIES) {
                return false;
            }

            if ($exception instanceof ConnectException) {
                return true;
            }

            if ($response) {
                if ($response->getStatusCode() >= 500) {
                    return true;
                }
            }

            return false;
        };
    }

    /**
     * @return \Closure
     */
    protected function retryDelay()
    {
        return function ($numberOfRetries) {
            return 1000 * $numberOfRetries;
        };
    }
}