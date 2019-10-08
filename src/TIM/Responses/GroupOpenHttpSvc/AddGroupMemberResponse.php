<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class AddGroupMemberResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc
 */
class AddGroupMemberResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getMemberList()
    {
        return $this->content['MemberList'];
    }
}
