<?php

namespace BiuBiuJun\QCloud\Kernel\HttpClient;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Kernel\Sign\TicSign;

/**
 * Class TlsSigHttpClient
 *
 * @package BiuBiuJun\QCloud\TimClient
 */
class TicKeyHttpClient extends HttpClient
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

    /**
     * TicKeyHttpClient constructor.
     *
     * @param string                                $SDKAppID
     * @param \BiuBiuJun\QCloud\Kernel\Sign\TicSign $ticSign
     * @param int                                   $expires
     * @param string                                $baseUri
     */
    public function __construct(string $SDKAppID, TicSign $ticSign, int $expires, string $baseUri)
    {
        $this->SDKAppID = $SDKAppID;
        $this->expireTime = time() + $expires;
        $this->sign = $ticSign->sign($this->expireTime);
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
}
