<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenIm;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class SendMsgResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\OpenIm
 */
class SendMsgResponse extends TimResponse
{
    /**
     * @return int
     */
    public function getMsgTime()
    {
        return $this->content['MsgTime'];
    }
}
