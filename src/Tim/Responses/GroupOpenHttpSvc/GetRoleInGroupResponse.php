<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GetRoleInGroupResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc
 */
class GetRoleInGroupResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getUserIdList()
    {
        return $this->content['UserIdList'];
    }
}
