<?php

namespace BiuBiuJun\QCloud\TIM\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class FriendImportResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class FriendImportResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
