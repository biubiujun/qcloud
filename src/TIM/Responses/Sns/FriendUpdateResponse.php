<?php

namespace BiuBiuJun\QCloud\TIM\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class FriendUpdateResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class FriendUpdateResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
