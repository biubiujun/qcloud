<?php

namespace BiuBiuJun\QCloud\Tiw\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class DescribeOnlineRecordResponse
 *
 * @package BiuBiuJun\QCloud\Tiw\Responses
 */
class DescribeOnlineRecordResponse extends BaseTcResponse
{
    /**
     * @return string
     */
    public function getFinishReason()
    {
        return $this->content['FinishReason'];
    }

    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['TaskId'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->content['Status'];
    }

    /**
     * @return int
     */
    public function getRoomId()
    {
        return $this->content['RoomId'];
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['GroupId'];
    }

    /**
     * @return string
     */
    public function getRecordUserId()
    {
        return $this->content['RecordUserId'];
    }

    /**
     * @return int
     */
    public function getRecordStartTime()
    {
        return $this->content['RecordStartTime'];
    }

    /**
     * @return int
     */
    public function getRecordStopTime()
    {
        return $this->content['RecordStopTime'];
    }

    /**
     * @return int
     */
    public function getTotalTime()
    {
        return $this->content['TotalTime'];
    }

    /**
     * @return int
     */
    public function getExceptionCnt()
    {
        return $this->content['ExceptionCnt'];
    }

    /**
     * @return array
     */
    public function getOmittedDurations()
    {
        return $this->content['OmittedDurations'];
    }

    /**
     * @return array
     */
    public function getVideoInfos()
    {
        return $this->content['VideoInfos'];
    }
}
