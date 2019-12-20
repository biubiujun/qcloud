<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class DescribeOnlineRecordRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class DescribeOnlineRecordRequest extends BaseRequest
{
    /**
     * DescribeOnlineRecordRequest constructor.
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
