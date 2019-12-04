<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Exceptions\BadRequestException;
use BiuBiuJun\QCloud\Exceptions\HttpException;
use BiuBiuJun\QCloud\Kernel\BaseResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Class VodResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
abstract class VodResponse extends BaseResponse
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
        if (isset($content['Response']) && !isset($content['Response']['Error'])) {
            $this->isSuccessful = true;
            $this->content = $content['Response'];
        } else {
            throw new BadRequestException($content['Response']['Error']['Message'], $content['Response']['Error']['Code']);
        }
    }
}
