<?php

namespace BiuBiuJun\QCloud\TIM\Responses\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class BatchSendMsgResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenIm
 */
class BatchSendMsgResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getErrorList()
    {
        return $this->content['ErrorList'];
    }
}
