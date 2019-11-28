<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenMsgSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetHistoryResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\OpenMsgSvc
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
