<?php

namespace BiuBiuJun\QCloud\TIM\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class FriendDeleteResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class FriendDeleteResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
