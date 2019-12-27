<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

/**
 * Class StopOnlineRecordRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class StopOnlineRecordRequest extends BaseTiwRequest
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
