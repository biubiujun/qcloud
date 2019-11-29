<?php

namespace BiuBiuJun\QCloud\Tic\Responses\Record;

use BiuBiuJun\QCloud\Tic\Responses\TicResponse;

/**
 * Class OnlineStartResponse
 *
 * @package BiuBiuJun\QCloud\TicClient\Responses\Record
 */
class OnlineStartResponse extends TicResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['task_id'];
    }
}
