<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetRoleInGroupResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
 */
class GetRoleInGroupResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getUserIdList()
    {
        return $this->content['UserIdList'];
    }
}
