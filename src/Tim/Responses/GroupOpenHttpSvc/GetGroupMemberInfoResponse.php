<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GetGroupMemberInfoResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
 */
class GetGroupMemberInfoResponse extends TimResponse
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
