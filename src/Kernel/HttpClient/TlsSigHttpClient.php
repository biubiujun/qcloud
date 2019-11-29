<?php

namespace BiuBiuJun\QCloud\Kernel\HttpClient;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Kernel\Contracts\TlsSignInterface;

/**
 * Class TlsSigHttpClient
 *
 * @package BiuBiuJun\QCloud\TimClient
 */
class TlsSigHttpClient extends HttpClient
{
    /**
     * @var string
     */
    protected $SDKAppID;

    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $userSign;

    /**
     * TlsSigHttpClient constructor.
     *
     * @param string                                              $SDKAppID
     * @param string                                              $identifier
     * @param \BiuBiuJun\QCloud\Kernel\Contracts\TlsSignInterface $tlsSign
     * @param string                                              $baseUri
     */
    public function __construct(string $SDKAppID, string $identifier, TlsSignInterface $tlsSign, string $baseUri)
    {
        $this->SDKAppID = $SDKAppID;
        $this->identifier = $identifier;
        $this->userSign = $tlsSign->sign($this->identifier);
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
                'identifier' => $this->identifier,
                'sdkappid' => $this->SDKAppID,
                'random' => uniqid(),
                'contenttype' => 'json',
                'usersig' => $this->userSign,
            ],
            'json' => $request->getParameters(),
        ];
    }
}
