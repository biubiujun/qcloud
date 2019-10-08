<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

class GetJoinedGroupListResponse extends BaseResponse
{
    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->content['TotalCount'];
    }

    /**
     * @return array
     */
    public function getGroupIdList()
    {
        return $this->content['GroupIdList'];
    }
}
