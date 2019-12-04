<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

/**
 * Class PullEventsResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class PullEventsResponse extends VodResponse
{
    /**
     * @return array
     */
    public function getEventSet()
    {
        return $this->content['EventSet'];
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->content['RequestId'];
    }
}
