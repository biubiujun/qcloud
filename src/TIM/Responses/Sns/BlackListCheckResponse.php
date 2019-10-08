<?php

namespace BiuBiuJun\QCloud\TIM\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class BlackListCheckResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class BlackListCheckResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getBlackListCheckItem()
    {
        return $this->content['BlackListCheckItem'];
    }

    /**
     * @return array
     */
    public function getFailAccount()
    {
        return $this->content['Fail_Account'];
    }
}
