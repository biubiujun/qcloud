<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Exceptions\HttpException;
use BiuBiuJun\QCloud\Kernel\BaseResponse;
use Psr\Http\Message\ResponseInterface;

abstract class VodResponse extends BaseResponse
{
    public function handle(ResponseInterface $response)
    {
        if ($response->getStatusCode() != 200) {
            throw new HttpException('Request failed: ' . $response->getBody()->getContents(), $response->getBody()->rewind(), $response->getStatusCode());
        }

        $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        $this->isSuccessful = true;
        $this->content = $content;
    }
}
