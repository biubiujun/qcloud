<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class SetOnlineRecordCallbackRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class SetOnlineRecordCallbackRequest extends BaseRequest
{
    /**
     * SetOnlineRecordCallbackRequest constructor.
     *
     * @param string $callback
     */
    public function __construct(string $callback)
    {
        $this->setCallback($callback);
    }

    /**
     * @param string $callback
     *
     * @return $this
     */
    public function setCallback(string $callback)
    {
        $this->setParameter('Callback', $callback);

        return $this;
    }
}
