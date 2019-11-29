<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

class ImportGroupResponse extends TimResponse
{
    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['GroupId'];
    }
}
