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
            $this->isSuccessful = false;
            if (isset($content['ActionStatus']) && 'FAIL' == $content['ActionStatus']) {
                throw new BadRequestException($content['ErrorInfo'], $content['ErrorCode']);
            }
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
