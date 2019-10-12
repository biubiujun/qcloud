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
}
