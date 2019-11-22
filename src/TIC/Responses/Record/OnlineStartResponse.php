<?php

namespace BiuBiuJun\QCloud\TIC\Responses\Record;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class OnlineStartResponse
 *
 * @package BiuBiuJun\QCloud\TIC\Responses\Record
 */
class OnlineStartResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getMemberList()
    {
        return $this->content['MemberList'];
    }
}