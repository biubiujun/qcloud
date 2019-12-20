<?php

namespace BiuBiuJun\QCloud\Tiw\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class CreateTranscodeResponse
 *
 * @package BiuBiuJun\QCloud\Tiw\Responses
 */
class CreateTranscodeResponse extends BaseTcResponse
{
    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['TaskId'];
    }
}
