<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class StopOnlineRecordRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class StopOnlineRecordRequest extends BaseRequest
{
    /**
     * StopOnlineRecordRequest constructor.
     *
     * @param int    $sdkAppId
     * @param string $taskId
     */
    public function __construct(int $sdkAppId, string $taskId)
    {
        $this->setSdkAppId($sdkAppId)
            ->setTaskId($taskId);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'StopOnlineRecord';
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
     * @param string $taskId
     *
     * @return $this
     */
    public function setTaskId(string $taskId)
    {
        $this->setParameter('TaskId', $taskId);

        return $this;
    }
}
