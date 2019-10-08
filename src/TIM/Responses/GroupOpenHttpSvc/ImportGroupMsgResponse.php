<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

class ImportGroupMsgResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getImportMsgResult()
    {
        return $this->content['ImportMsgResult'];
    }

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->content['Result'];
    }

    /**
     * @return int
     */
    public function getMsgSeq()
    {
        return $this->content['MsgSeq'];
    }

    /**
     * @return int
     */
    public function getMsgTime()
    {
        return $this->content['MsgTime'];
    }
}
