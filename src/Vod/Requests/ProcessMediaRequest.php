<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\AiAnalysisTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\AiContentReviewTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\MediaProcessTaskInput;

/**
 * Class ProcessMediaRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class ProcessMediaRequest extends BaseVodRequest
{
    /**
     * ProcessMediaRequest constructor.
     *
     * @param string $fileId
     */
    public function __construct(string $fileId)
    {
        $this->setFileId($fileId);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'ProcessMedia';
    }

    /**
     * @param string $fileId
     *
     * @return $this
     */
    public function setFileId(string $fileId)
    {
        $this->setParameter('FileId', $fileId);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\MediaProcessTaskInput $mediaProcessTask
     *
     * @return $this
     */
    public function setMediaProcessTask(MediaProcessTaskInput $mediaProcessTask)
    {
        $this->setParameter('MediaProcessTask', $mediaProcessTask);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\AiContentReviewTaskInput $aiContentReviewTask
     *
     * @return $this
     */
    public function setAiContentReviewTask(AiContentReviewTaskInput $aiContentReviewTask)
    {
        $this->setParameter('AiContentReviewTask', $aiContentReviewTask);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\AiAnalysisTaskInput $aiAnalysisTask
     *
     * @return $this
     */
    public function setAiAnalysisTask(AiAnalysisTaskInput $aiAnalysisTask)
    {
        $this->setParameter('AiAnalysisTask', $aiAnalysisTask);

        return $this;
    }

    /**
     * @param int $taskPriority
     *
     * @return $this
     */
    public function setAiRecognitionTask(int $taskPriority)
    {
        $this->setParameter('TaskPriority', $taskPriority);

        return $this;
    }

    /**
     * @param string $tasksNotifyMode
     *
     * @return $this
     */
    public function setTasksNotifyMode(string $tasksNotifyMode)
    {
        $this->setParameter('TaskNotifyMode', $tasksNotifyMode);

        return $this;
    }

    /**
     * @param string $sessionContext
     *
     * @return $this
     */
    public function setSessionContext(string $sessionContext)
    {
        $this->setParameter('SessionContext', $sessionContext);

        return $this;
    }

    /**
     * @param string $sessionId
     *
     * @return $this
     */
    public function setSessionId(string $sessionId)
    {
        $this->setParameter('SessionId', $sessionId);

        return $this;
    }

    /**
     * @param string $extInfo
     *
     * @return $this
     */
    public function setExtInfo(string $extInfo)
    {
        $this->setParameter('ExtInfo', $extInfo);

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
