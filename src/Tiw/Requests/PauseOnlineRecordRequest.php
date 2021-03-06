<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

/**
 * Class PauseOnlineRecordRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class PauseOnlineRecordRequest extends BaseTiwRequest
{
    /**
     * PauseOnlineRecordRequest constructor.
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
        return 'PauseOnlineRecord';
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
