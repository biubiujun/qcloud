<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class OfflineCallbackRequest
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Record
 */
class OfflineCallbackRequest extends BaseRequest
{
    /**
     * OfflineCallbackRequest constructor.
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
        return 'record/v1/offline/callback';
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
