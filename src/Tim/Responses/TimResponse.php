<?php

namespace BiuBiuJun\QCloud\Tim\Responses;

use BiuBiuJun\QCloud\Exceptions\BadRequestException;
use BiuBiuJun\QCloud\Exceptions\HttpException;
use BiuBiuJun\QCloud\Kernel\BaseResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Class TimResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses
 */
abstract class TimResponse extends BaseResponse
{
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
}
