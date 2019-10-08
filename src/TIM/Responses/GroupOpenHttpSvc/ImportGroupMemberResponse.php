<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class ImportGroupMemberResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc
 */
class ImportGroupMemberResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getMemberList()
    {
        return $this->content['MemberList'];
    }
}
