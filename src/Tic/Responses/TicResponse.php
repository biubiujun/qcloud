<?php

namespace BiuBiuJun\QCloud\Tic\Responses;

use BiuBiuJun\QCloud\Exceptions\BadRequestException;
use BiuBiuJun\QCloud\Exceptions\HttpException;
use BiuBiuJun\QCloud\Kernel\BaseResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Class TicResponse
 *
 * @package BiuBiuJun\QCloud\Tic\Responses
 */
abstract class TicResponse extends BaseResponse
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
        if (isset($content['error_code']) && 0 == $content['error_code']) {
            $this->isSuccessful = true;
            $this->content = $content;
        } else {
            $this->isSuccessful = false;
            throw new BadRequestException($content['error_msg'] ?? '', $content['error_code']);
        }
    }
}
