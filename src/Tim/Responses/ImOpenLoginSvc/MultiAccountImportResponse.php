<?php

namespace BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class MultiAccountImportResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\ImOpenLoginSvc
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
