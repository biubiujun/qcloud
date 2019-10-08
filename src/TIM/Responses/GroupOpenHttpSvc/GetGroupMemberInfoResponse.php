<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetGroupMemberInfoResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc
 */
class GetGroupMemberInfoResponse extends BaseResponse
{
    /**
     * @return int
     */
    public function getMemberNum()
    {
        return $this->content['MemberNum'];
    }

    /**
     * @return array
     */
    public function getMemberList()
    {
        return $this->content['MemberList'];
    }
}
