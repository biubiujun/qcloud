<?php

namespace BiuBiuJun\QCloud\Tic\Requests\Record;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class OnlineCallbackRequest
 *
 * @package BiuBiuJun\QCloud\Tic\Requests\Record
 */
class OnlineCallbackRequest extends BaseRequest
{
    /**
     * OnlineCallback constructor.
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
        return 'record/v1/online/callback';
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
