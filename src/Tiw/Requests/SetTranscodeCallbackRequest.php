<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

/**
 * Class SetTranscodeCallbackRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class SetTranscodeCallbackRequest extends BaseTiwRequest
{
    /**
     * SetTranscodeCallbackRequest constructor.
     *
     * @param int    $sdkAppId
     * @param string $callback
     */
    public function __construct(int $sdkAppId, string $callback)
    {
        $this->setSdkAppId($sdkAppId)
            ->setCallback($callback);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'SetTranscodeCallback';
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
