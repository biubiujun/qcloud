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
     * @return string
     */
    public function getAction(): string
    {
        return 'SetOnlineRecordCallback';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '2019-09-19';
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
