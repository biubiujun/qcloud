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
     * @param string $taskId
     */
    public function __construct(string $taskId)
    {
        $this->setTaskId($taskId);
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
