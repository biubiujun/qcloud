<?php

namespace BiuBiuJun\QCloud\Kernel\HttpClient;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Kernel\Contracts\TLSSigAPIInterface;

/**
 * Class TLSSigHttpClient
 *
 * @package BiuBiuJun\QCloud\TIM
 */
class TLSSigHttpClient extends HttpClient
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
    protected $userSig;

    /**
     * TLSSigHttpClient constructor.
     *
     * @param string                                                $SDKAppID
     * @param string                                                $identifier
     * @param \BiuBiuJun\QCloud\Kernel\Contracts\TLSSigAPIInterface $sig
     * @param string                                                $baseUri
     */
    public function __construct(string $SDKAppID, string $identifier, TLSSigAPIInterface $sig, string $baseUri)
    {
        $this->SDKAppID = $SDKAppID;
        $this->identifier = $identifier;
        $this->userSig = $sig->genSig($this->identifier);
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
                'usersig' => $this->userSig,
            ],
            'json' => $request->getParameters(),
        ];
    }
}
