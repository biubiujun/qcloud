<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Transcode;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class TranscodeCallbackRequest
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Transcode
 */
class TranscodeCallbackRequest extends BaseRequest
{
    /**
     * TranscodeCallbackRequest constructor.
     *
     * @param string $callback
     */
    public function __construct(string $callback)
    {
        $this->setCallback($callback);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'transcode/v1/callback';
    }

    /**
     * @param string $callback
     *
     * @return $this
     */
    public function setCallback(string $callback)
    {
        $this->setParameter('callback', $callback);

        return $this;
    }
}
