<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class PullEventsRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class PullEventsRequest extends BaseRequest
{
    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'PullEvents';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '2018-07-17';
    }
}
