<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Exceptions\BadRequestException;
use BiuBiuJun\QCloud\Exceptions\HttpException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class VodResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
abstract class BaseTcResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->content['RequestId'];
    }

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
            throw new BadRequestException(json_encode($content['Response']));
        }
    }
}
