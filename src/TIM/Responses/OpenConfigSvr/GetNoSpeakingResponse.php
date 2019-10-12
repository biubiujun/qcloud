<?php

namespace BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetNoSpeakingResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr
 */
class GetNoSpeakingResponse extends BaseResponse
{
    /**
     * @var bool
     */
    protected $hasActionStatus = false;

    /**
     * @return int
     */
    public function getC2CMsgNoSpeakingTime()
    {
        return $this->content['C2CmsgNospeakingTime'];
    }

    /**
     * @return int
     */
    public function getGroupmsgNospeakingTime()
    {
        return $this->content['GroupmsgNospeakingTime'];
    }
}
