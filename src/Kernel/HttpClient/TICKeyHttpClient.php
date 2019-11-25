<?php

namespace BiuBiuJun\QCloud\Kernel\HttpClient;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Kernel\BaseResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Class TLSSigHttpClient
 *
 * @package BiuBiuJun\QCloud\TIM
 */
class TICKeyHttpClient extends HttpClient
{
    /**
     * @var string
     */
    protected $SDKAppID;

    /**
     * @var string
     */
    protected $sign;

    /**
     * @var int
     */
    protected $expireTime;

    public function __construct(string $SDKAppID, string $TICKey, int $expires, string $baseUri)
    {
        $this->SDKAppID = $SDKAppID;
        $this->setExpireTimeAndSign($TICKey, $expires);
        $this->baseUri = $baseUri;
    }

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest $request
     *
     * @return array
     */
    protected function options(BaseRequest $request)
    {
        return [
            'query' => [
                'sdkappid' => $this->SDKAppID,
                'sign' => $this->sign,
                'expire_time' => $this->expireTime,
                'random' => uniqid(),
            ],
            'json' => $request->getParameters(),
        ];
    }

    /**
     * @param string $TICKey
     * @param int    $expires
     *
     * @return string
     */
    protected function setExpireTimeAndSign(string $TICKey, int $expires)
    {
        $this->expireTime = time() + $expires;
        $this->sign = md5($TICKey . $this->expireTime);
    }

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseResponse $response
     * @param \Psr\Http\Message\ResponseInterface   $resp
     *
     * @return \BiuBiuJun\QCloud\Kernel\BaseResponse
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     */
    protected function handleRequest(BaseResponse $response, ResponseInterface $resp)
    {
        $response->handleTIC($resp);

        return $response;
    }
}
