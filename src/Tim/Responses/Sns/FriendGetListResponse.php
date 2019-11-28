<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class FriendGetListResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class FriendGetListResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getInfoItem()
    {
        return $this->content['InfoItem'];
    }
}
