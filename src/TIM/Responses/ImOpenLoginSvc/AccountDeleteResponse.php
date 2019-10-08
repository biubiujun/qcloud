<?php

namespace BiuBiuJun\QCloud\TIM\Responses\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class AccountDeleteResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\ImOpenLoginSvc
 */
class AccountDeleteResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
