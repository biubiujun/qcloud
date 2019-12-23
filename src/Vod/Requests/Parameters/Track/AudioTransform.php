<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AudioTransform
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class AudioTransform extends BaseParameter
{
    /**
     * AudioTransform constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->setType($type);
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->setParameter('Type', $type);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Track\AudioVolumeParam $audioVolumeParam
     *
     * @return $this
     */
    public function setVolumeParam(AudioVolumeParam $audioVolumeParam)
    {
        $this->setParameter('VolumeParam', $audioVolumeParam->getParameters());

        return $this;
    }
}
