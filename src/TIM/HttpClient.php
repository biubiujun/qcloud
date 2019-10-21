<?php

namespace BiuBiuJun\QCloud\TIM;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Kernel\BaseResponse;
use BiuBiuJun\QCloud\Kernel\Contracts\TLSSigAPIInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use function GuzzleHttp\choose_handler;

/**
 * Class HttpClient
 *
 * @package BiuBiuJun\QCloud\TIM
 */
class HttpClient
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    protected $httpClient;

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
    private $userSig;

    /**
     * @var string
     */
    private $baseUri;

    /**
     * HttpClient constructor.
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
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        if (!($this->httpClient instanceof ClientInterface)) {
            $this->httpClient = new Client([
                'base_uri' => $this->baseUri,
                'handler' => choose_handler(),
            ]);
        }

        return $this->httpClient;
    }

    /**
     * @param \BiuBiuJun\QCloud\Kernel\BaseRequest  $request
     * @param \BiuBiuJun\QCloud\Kernel\BaseResponse $response
     *
     * @return \BiuBiuJun\QCloud\Kernel\BaseResponse
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(BaseRequest $request, BaseResponse $response): BaseResponse
    {
        $options = [
            'query' => [
                'identifier' => $this->identifier,
                'sdkappid' => $this->SDKAppID,
                'random' => uniqid(),
                'contenttype' => 'json',
                'usersig' => $this->userSig,

            ],
            'json' => $request->getParameters(),
            'handler' => choose_handler(),
        ];
        $resp = $this->getHttpClient()->request('POST', $request->getUri(), $options);
        $response->handle($resp);

        return $response;
    }
}
