<?php

namespace BiuBiuJun\QCloud\Tic\Responses\Transcode;

use BiuBiuJun\QCloud\Tic\Responses\TicResponse;

/**
 * Class TranscodeQueryResponse
 *
 * @package BiuBiuJun\QCloud\Tic\Responses\Transcode
 */
class TranscodeQueryResponse extends TicResponse
{
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
    public function getProgress()
    {
        return $this->content['progress'];
    }

    /**
     * @return string
     */
    public function getResultUrl()
    {
        return $this->content['result_url'];
    }

    /**
     * @return string
     */
    public function getResolution()
    {
        return $this->content['resolution'];
    }

    /**
     * @return int
     */
    public function getPages()
    {
        return $this->content['pages'];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->content['title'];
    }
}
