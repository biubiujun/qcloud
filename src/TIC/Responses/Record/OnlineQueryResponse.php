<?php

namespace BiuBiuJun\QCloud\TIC\Responses\Record;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class OnlineQueryResponse
 *
 * @package BiuBiuJun\QCloud\TIC\Responses\Record
 */
class OnlineQueryResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getFinishReason()
    {
        return $this->content['finish_reason'];
    }

    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['task_id'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->content['status'];
    }

    /**
     * @return int
     */
    public function getRoomId()
    {
        return $this->content['room_id'];
    }

    /**
     * @return string
     */
    public function getRecordUserId()
    {
        return $this->content['record_user_id'];
    }

    /**
     * @return int
     */
    public function getStartTime()
    {
        return $this->content['start_time'];
    }

    /**
     * @return int
     */
    public function getStopTime()
    {
        return $this->content['stop_time'];
    }

    /**
     * @return int
     */
    public function getTotalTime()
    {
        return $this->content['total_time'];
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['group_id'];
    }

    /**
     * @return array
     */
    public function getVideoInfo()
    {
        return $this->content['video_info'];
    }

    /**
     * @return array
     */
    public function getOmittedDuration()
    {
        return $this->content['omitted_duration'];
    }
}
