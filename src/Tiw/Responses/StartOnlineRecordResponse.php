<?php

namespace BiuBiuJun\QCloud\Tiw\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class StartOnlineRecordResponse
 *
 * @package BiuBiuJun\QCloud\Tiw\Responses
 */
class StartOnlineRecordResponse extends BaseTcResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['TaskId'];
    }
}
