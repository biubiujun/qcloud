<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class QueryStateResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\OpenIm
 */
class QueryStateResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getQueryResult()
    {
        return $this->content['QueryResult'];
    }
}
