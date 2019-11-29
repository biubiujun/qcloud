<?php

namespace BiuBiuJun\QCloud\Tic\Responses\Record;

use BiuBiuJun\QCloud\Tic\Responses\TicResponse;

/**
 * Class OfflineCreateResponse
 *
 * @package BiuBiuJun\QCloud\Tic\Responses\Record
 */
class OfflineCreateResponse extends TicResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['task_id'];
    }
}
