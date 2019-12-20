<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ResumeOnlineRecordRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class ResumeOnlineRecordRequest extends BaseRequest
{
    /**
     * ResumeOnlineRecordRequest constructor.
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
