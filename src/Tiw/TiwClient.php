<?php

namespace BiuBiuJun\QCloud\Tiw;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Kernel\AbstractClient;
use BiuBiuJun\QCloud\Kernel\HttpClient\TcHttpClient;
use Closure;

/**
 * Class TiwClient
 *
 * @package BiuBiuJun\QCloud\Tiw
 */
class TiwClient extends AbstractClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://tiw.tencentcloudapi.com/';

    /**
     * VodClient constructor.
     *
     * @param string $secretId
     * @param string $secretKey
     */
    public function __construct(string $secretId, string $secretKey)
    {
        $this->secretId = $secretId;
        $this->secretKey = $secretKey;
    }

    /**
     * @return \BiuBiuJun\QCloud\Kernel\HttpClient\TcHttpClient
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function getClient()
    {
        if (!$this->client instanceof TcHttpClient) {
            $this->client = new TcHttpClient($this->getTcSign(), $this->baseUri);
        }

        return $this->client;
    }

    /**
     * @param string   $notifyClass
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidSignException
     */
    public function notify(string $notifyClass, Closure $closure)
    {
        if (!class_exists($notifyClass)) {
            throw new InvalidArgumentException("Notify Class {$notifyClass} not exist.");
        }
        /** @var \BiuBiuJun\QCloud\Tiw\Notifies\BaseNotify $notify */
        $notify = new $notifyClass($this->getTicSign());

        return $notify->handle($closure);
    }
}
