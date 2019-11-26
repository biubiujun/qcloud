<?php

namespace BiuBiuJun\QCloud\TIC;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Kernel\HttpClient\TICKeyHttpClient;
use BiuBiuJun\QCloud\Kernel\TICSign;
use BiuBiuJun\QCloud\Tencent;
use Closure;

/**
 * Class TIC
 *
 * @package BiuBiuJun\QCloud\TIC
 */
class TIC extends Tencent
{
    /**
     * @var string
     */
    protected $baseUri = 'https://iclass.api.qcloud.com/';

    /**
     * @var \BiuBiuJun\QCloud\Kernel\TICSign
     */
    protected $ticSign;

    /**
     * TIC constructor.
     *
     * @param string $SDKAppID
     * @param string $TICKey
     * @param int    $expires
     * @param string $privateKey
     * @param string $publicKey
     * @param string $sigVersion
     */
    public function __construct(string $SDKAppID, string $privateKey, string $publicKey, string $TICKey, int $expires = 86400, $sigVersion = 'TLSSigAPIv1')
    {
        parent::__construct($SDKAppID, $privateKey, $publicKey, $sigVersion);

        $this->ticSign = new TICSign($TICKey);
        $this->client = new TICKeyHttpClient($SDKAppID, $this->ticSign, $expires, $this->baseUri);
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
        $notify = new $notifyClass($this->ticSign);

        return $notify->handle($closure);
    }
}
