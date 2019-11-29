<?php

namespace BiuBiuJun\QCloud\Tic;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Kernel\AbstractClient;
use BiuBiuJun\QCloud\Kernel\HttpClient\TicKeyHttpClient;
use Closure;

/**
 * Class TicClient
 *
 * @package BiuBiuJun\QCloud\TicClient
 */
class TicClient extends AbstractClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://iclass.api.qcloud.com/';

    /**
     * @var int
     */
    private $expires;

    /**
     * TicClient constructor.
     *
     * @param string $sdkAppId
     * @param string $privateKey
     * @param string $publicKey
     * @param string $ticKey
     * @param int    $expires
     * @param string $sigVersion
     */
    public function __construct(string $sdkAppId, string $privateKey, string $publicKey, string $ticKey, int $expires = 86400, $sigVersion = 'V1')
    {
        $this->sdkAppId = $sdkAppId;
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
        $this->ticKey = $ticKey;
        $this->expires = $expires;
        $this->sigVersion = $sigVersion;
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\HttpClient\TicKeyHttpClient
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function getClient()
    {
        if (!$this->client instanceof TicKeyHttpClient) {
            $this->client = new TicKeyHttpClient($this->sdkAppId, $this->getTicSign(), $this->expires, $this->baseUri);
        }

        return $this->client;
    }

    /**
     * @param string   $notifyClass
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function notify(string $notifyClass, Closure $closure)
    {
        if (!class_exists($notifyClass)) {
            throw new InvalidArgumentException("Notify Class {$notifyClass} not exist.");
        }
        $notify = new $notifyClass($this->$this->getTicSign());

        return $notify->handle($closure);
    }
}
