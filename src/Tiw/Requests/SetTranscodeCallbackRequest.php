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
     * @return string
     */
    public function getVersion(): string
    {
        return '2019-09-19';
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return 'ap-guangzhou';
    }

    /**
     * @param int $sdkAppId
     *
     * @return $this
     */
    public function setSdkAppId(int $sdkAppId)
    {
        $this->setParameter('SdkAppId', $sdkAppId);

        return $this;
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
