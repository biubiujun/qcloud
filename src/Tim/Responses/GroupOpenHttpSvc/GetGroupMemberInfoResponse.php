<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetGroupMemberInfoResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
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
