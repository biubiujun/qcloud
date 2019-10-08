<?php

namespace BiuBiuJun\QCloud\TIM\Responses\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class QueryStateResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenIm
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
