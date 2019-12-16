<?php

namespace BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class MultiAccountImportResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc
 */
class MultiAccountImportResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getFailAccounts()
    {
        return $this->content['FailAccounts'];
    }
}
