<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class PullEventsResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class PullEventsResponse extends BaseTcResponse
{
    /**
     * @return array
     */
    public function getEventSet()
    {
        return $this->content['EventSet'];
    }
}
