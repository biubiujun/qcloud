<?php

namespace BiuBiuJun\QCloud\TIC\Responses\Record;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class OnlineStartResponse
 *
 * @package BiuBiuJun\QCloud\TIC\Responses\Record
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
