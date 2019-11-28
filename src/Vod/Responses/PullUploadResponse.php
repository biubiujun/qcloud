<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

class PullUploadResponse extends BaseResponse
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
