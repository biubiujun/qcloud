<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenIm;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class BatchSendMsgResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\OpenIm
 */
class BatchSendMsgResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getErrorList()
    {
        return $this->content['ErrorList'];
    }
}
