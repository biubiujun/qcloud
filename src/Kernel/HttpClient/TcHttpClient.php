<?php

namespace BiuBiuJun\QCloud\Kernel\HttpClient;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Kernel\Sign\TcSign;

/**
 * Class TcHttpClient
 *
 * @package BiuBiuJun\QCloud\Kernel\HttpClient
 */
class TcHttpClient extends HttpClient
{
    /**
     * @var \BiuBiuJun\QCloud\Kernel\Sign\TcSign
     */
    protected $tcSign;

    /**
     * TcHttpClient constructor.
     *
     * @param \BiuBiuJun\QCloud\Kernel\Sign\TcSign $tcSign
     * @param string                               $baseUri
     */
    public function __construct(TcSign $tcSign, string $baseUri)
    {
        $this->tcSign = $tcSign;
        $this->baseUri = $baseUri;
    }

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest $request
     *
     * @return array
     */
    protected function options(BaseRequest $request)
    {
        $parameters = $request->getParameters();

        $host = parse_url($this->baseUri)['host'] ?? '';

        $headers = $this->tcSign->sign($parameters, $host);

        $headers['X-TC-Action'] = $request->getAction();
        $headers['X-TC-Version'] = $request->getVersion();
        $region = $request->getRegion();
        if ($region) {
            $headers['X-TC-Region'] = $region;
        }

        return [
            'headers' => $headers,
            'json' => $request->getParameters(),
        ];
    }
}
