<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenIm;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class QueryStateResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\OpenIm
 */
class QueryStateResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getQueryResult()
    {
        return $this->content['QueryResult'];
    }
}
