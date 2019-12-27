<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

/**
 * Class PullEventsRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class PullEventsRequest extends BaseVodRequest
{
    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'PullEvents';
    }
}
