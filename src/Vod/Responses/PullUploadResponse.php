<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class PullUploadResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class PullUploadResponse extends BaseTcResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['TaskId'];
    }
}
