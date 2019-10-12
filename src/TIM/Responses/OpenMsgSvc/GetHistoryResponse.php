<?php

namespace BiuBiuJun\QCloud\TIM\Responses\OpenMsgSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetHistoryResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenMsgSvc
 */
class GetHistoryResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getFile()
    {
        return $this->content['File'];
    }
}
