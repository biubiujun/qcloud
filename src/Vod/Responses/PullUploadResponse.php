<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

/**
 * Class PullUploadResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class PullUploadResponse extends VodResponse
{
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
    public function getRequestId()
    {
        return $this->content['RequestId'];
    }
}
