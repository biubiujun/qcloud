<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

class ImportGroupMsgResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getImportMsgResult()
    {
        return $this->content['ImportMsgResult'];
    }
}
