<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Exceptions\BadRequestException;
use BiuBiuJun\QCloud\Exceptions\HttpException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseResponse
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
abstract class BaseResponse
{
    /**
     * @var bool
     */
    protected $hasActionStatus = true;

    /**
     * @var bool
     */
    protected $isSuccessful;

    /**
     * @var array
     */
    protected $content;

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     */
    public function handle(ResponseInterface $response)
    {
        if ($response->getStatusCode() != 200) {
            throw new HttpException('Request failed: ' . $response->getBody()->getContents(), $response->getBody()->rewind(), $response->getStatusCode());
        }

        $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        if (isset($content['ActionStatus']) && 'OK' == $content['ActionStatus']) {
            $this->isSuccessful = true;
            $this->content = $content;
        } else {
            if (true === $this->hasActionStatus) {
                $this->isSuccessful = false;
                if (isset($content['ActionStatus']) && 'FAIL' == $content['ActionStatus']) {
                    throw new BadRequestException($content['ErrorInfo'], $content['ErrorCode']);
                }
            } else {
                if (0 == $content['ErrorCode']) {
                    $this->isSuccessful = true;
                    $this->content = $content;
                }
            }
        }
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     */
    public function handleTic(ResponseInterface $response)
    {
        if ($response->getStatusCode() != 200) {
            throw new HttpException('Request failed: ' . $response->getBody()->getContents(), $response->getBody()->rewind(), $response->getStatusCode());
        }

        $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        if (isset($content['error_code']) && 0 == $content['error_code']) {
            $this->isSuccessful = true;
            $this->content = $content;
        } else {
            $this->isSuccessful = false;
            throw new BadRequestException($content['error_msg'] ?? '', $content['error_code']);
        }
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->isSuccessful;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }
}
