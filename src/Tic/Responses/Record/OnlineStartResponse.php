<?php

namespace BiuBiuJun\QCloud\Tic\Responses\Record;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class OnlineStartResponse
 *
 * @package BiuBiuJun\QCloud\TicClient\Responses\Record
 */
class OnlineStartResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['task_id'];
    }
}
