<?php

namespace BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetAppInfoResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr
 */
class GetAppInfoResponse extends BaseResponse
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
