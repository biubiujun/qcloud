<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

/**
 * Class DescribeTaskDetailRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class DescribeTaskDetailRequest extends BaseVodRequest
{
    /**
     * DescribeTaskDetailRequest constructor.
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
    public function getAction(): string
    {
        return 'DescribeTaskDetail';
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

    /**
     * @param int $subAppId
     *
     * @return $this
     */
    public function setSubAppId(int $subAppId)
    {
        $this->setParameter('SubAppId', $subAppId);

        return $this;
    }
}
