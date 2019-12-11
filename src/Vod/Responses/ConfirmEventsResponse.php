<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

/**
 * Class ConfirmEventsResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class ConfirmEventsResponse extends VodResponse
{
    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->content['RequestId'];
    }
}
