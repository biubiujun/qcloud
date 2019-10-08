<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

class GroupMsgGetSimpleResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['GroupId'];
    }

    /**
     * @return int
     */
    public function getIsFinished()
    {
        return $this->content['isFinished'];
    }

    /**
     * @return array
     */
    public function getRspMsgList()
    {
        return $this->content['RspMsgList'];
    }
}
