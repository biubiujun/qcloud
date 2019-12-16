<?php

namespace BiuBiuJun\QCloud\Tic\Requests\Record;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class OnlineStopRequest
 *
 * @package BiuBiuJun\QCloud\Tic\Requests\Record
 */
class OnlineStopRequest extends BaseRequest
{
    /**
     * OnlineStopRequest constructor.
     *
     * @param string $taskId
     */
    public function __construct(string $taskId)
    {
        $this->setTaskId($taskId);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'record/v1/online/stop';
    }

    /**
     * @param string $taskId
     *
     * @return $this
     */
    public function setTaskId(string $taskId)
    {
        $this->setParameter('task_id', $taskId);

        return $this;
    }
}
