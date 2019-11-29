<?php

namespace BiuBiuJun\QCloud\Tic\Responses\Transcode;

use BiuBiuJun\QCloud\Tic\Responses\TicResponse;

/**
 * Class TranscodeCreateResponse
 *
 * @package BiuBiuJun\QCloud\TicClient\Responses\Transcode
 */
class TranscodeCreateResponse extends TicResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['task_id'];
    }
}
