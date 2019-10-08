<?php

namespace BiuBiuJun\QCloud\TIM\Responses\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class SendMsgResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenIm
 */
class SendMsgResponse extends BaseResponse
{
    /**
     * @return int
     */
    public function getMsgTime()
    {
        return $this->content['MsgTime'];
    }
}
