<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class CreateGroupResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc
 */
class CreateGroupResponse extends TimResponse
{
    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['GroupId'];
    }
}
