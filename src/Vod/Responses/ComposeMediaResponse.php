<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

class ComposeMediaResponse extends VodResponse
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
