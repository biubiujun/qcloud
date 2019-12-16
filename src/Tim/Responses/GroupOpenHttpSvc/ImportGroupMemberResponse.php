<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class ImportGroupMemberResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc
 */
class ImportGroupMemberResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getMemberList()
    {
        return $this->content['MemberList'];
    }
}
