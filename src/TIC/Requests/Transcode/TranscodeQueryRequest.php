<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Transcode;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class TranscodeQueryRequest
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Transcode
 */
class TranscodeQueryRequest extends BaseRequest
{
    /**
     * TranscodeQueryRequest constructor.
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
        return 'transcode/v1/query';
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
