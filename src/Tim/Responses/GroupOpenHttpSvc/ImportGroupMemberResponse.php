<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class ImportGroupMemberResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
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
