<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GetAppInfoResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr
 */
class GetAppInfoResponse extends TimResponse
{
    /**
     * @var bool
     */
    protected $hasActionStatus = false;

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->content['Result'];
    }
}
