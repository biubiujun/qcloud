<?php

namespace BiuBiuJun\QCloud\TIM\Responses\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class MultiAccountImportResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\ImOpenLoginSvc
 */
class MultiAccountImportResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getFailAccounts()
    {
        return $this->content['FailAccounts'];
    }
}
