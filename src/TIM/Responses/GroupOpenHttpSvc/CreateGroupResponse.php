<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

class CreateGroupResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['GroupId'];
    }
}
