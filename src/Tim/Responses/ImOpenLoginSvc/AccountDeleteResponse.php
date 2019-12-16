<?php

namespace BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class AccountDeleteResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc
 */
class AccountDeleteResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
