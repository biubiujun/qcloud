<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

class GetGroupInfoResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getGroupInfo()
    {
        return $this->content['GroupInfo'];
    }
}
