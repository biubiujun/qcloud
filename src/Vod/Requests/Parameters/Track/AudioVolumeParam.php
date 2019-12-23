<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AudioVolumeParam
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class AudioVolumeParam extends BaseParameter
{
    /**
     * AudioVolumeParam constructor.
     *
     * @param int   $mute
     * @param float $gain
     */
    public function __construct(int $mute = 0, float $gain = 0.0)
    {
        $this->setMute($mute)
            ->setGain($gain);
    }

    /**
     * @param int $mute
     *
     * @return $this
     */
    public function setMute(int $mute)
    {
        $this->setParameter('Mute', $mute);

        return $this;
    }

    /**
     * @param float $gain
     *
     * @return $this
     */
    public function setGain(float $gain)
    {
        $this->setParameter('Gain', $gain);

        return $this;
    }
}
