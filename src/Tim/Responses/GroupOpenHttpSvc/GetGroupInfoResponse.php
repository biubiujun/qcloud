<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

class GetGroupInfoResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getGroupInfo()
    {
        return $this->content['GroupInfo'];
    }
}
