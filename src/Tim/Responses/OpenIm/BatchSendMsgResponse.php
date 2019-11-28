<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class BatchSendMsgResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\OpenIm
 */
class BatchSendMsgResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getErrorList()
    {
        return $this->content['ErrorList'];
    }
}
