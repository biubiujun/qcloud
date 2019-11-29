<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class BlackListCheckResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class BlackListCheckResponse extends TimResponse
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
