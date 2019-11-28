<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class SendMsgResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\OpenIm
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
