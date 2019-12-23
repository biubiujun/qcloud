<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class SetTranscodeCallbackRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class SetTranscodeCallbackRequest extends BaseRequest
{
    /**
     * SetTranscodeCallbackRequest constructor.
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
        return 'SetTranscodeCallback';
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
