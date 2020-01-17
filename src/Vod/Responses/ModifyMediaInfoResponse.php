<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class ModifyMediaInfoResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class ModifyMediaInfoResponse extends BaseTcResponse
{
    public function getCoverUrl()
    {
        return $this->content['CoverUrl'];
    }
}
