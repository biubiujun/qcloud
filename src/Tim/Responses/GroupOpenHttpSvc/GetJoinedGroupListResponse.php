<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

class GetJoinedGroupListResponse extends TimResponse
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
