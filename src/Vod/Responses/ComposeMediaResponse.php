<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

class ComposeMediaResponse extends BaseTcResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['TaskId'];
    }
}
