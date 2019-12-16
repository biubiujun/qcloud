<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class ImportGroupMsgResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc
 */
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
