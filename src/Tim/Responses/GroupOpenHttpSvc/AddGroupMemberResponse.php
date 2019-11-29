<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class AddGroupMemberResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
 */
class AddGroupMemberResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getMemberList()
    {
        return $this->content['MemberList'];
    }
}
