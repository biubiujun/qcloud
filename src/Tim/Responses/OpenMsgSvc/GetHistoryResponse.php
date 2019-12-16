<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenMsgSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GetHistoryResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\OpenMsgSvc
 */
class GetHistoryResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getFile()
    {
        return $this->content['File'];
    }
}
