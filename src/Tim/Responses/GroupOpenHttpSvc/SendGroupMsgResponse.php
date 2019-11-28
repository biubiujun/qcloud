<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class SendGroupMsgResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
 */
class SendGroupMsgResponse extends BaseResponse
{
    /**
     * @return int
     */
    public function getMsgTime()
    {
        return $this->content['MsgTime'];
    }

    /**
     * @return int
     */
    public function getMsgSeq()
    {
        return $this->content['MsgSeq'];
    }
}
