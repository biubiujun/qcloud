<?php

namespace BiuBiuJun\QCloud\Tic\Responses\Record;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

class OfflineCreateResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['task_id'];
    }
}
