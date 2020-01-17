<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class ProcessMediaResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class ProcessMediaResponse extends BaseTcResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['TaskId'];
    }
}
