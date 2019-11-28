<?php

namespace BiuBiuJun\QCloud\Tic\Responses\Transcode;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class TranscodeCreateResponse
 *
 * @package BiuBiuJun\QCloud\TicClient\Responses\Transcode
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
