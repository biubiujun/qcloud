<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetNoSpeakingResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\OpenConfigSvr
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
