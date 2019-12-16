<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GetNoSpeakingResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr
 */
class GetNoSpeakingResponse extends TimResponse
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
