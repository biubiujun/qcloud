<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class AddGroupMemberResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
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
