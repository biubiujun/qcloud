<?php

namespace BiuBiuJun\QCloud\TIC\Responses\Transcode;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class TranscodeCreateResponse
 *
 * @package BiuBiuJun\QCloud\TIC\Responses\Transcode
 */
class TranscodeCreateResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['task_id'];
    }
}
