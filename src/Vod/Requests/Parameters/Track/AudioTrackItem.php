<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AudioTrackItem
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class AudioTrackItem extends BaseParameter
{
    /**
     * AudioTrackItem constructor.
     *
     * @param string $sourceMedia
     */
    public function __construct(string $sourceMedia)
    {
        $this->setSourceMedia($sourceMedia);
    }

    /**
     * @param string $sourceMedia
     *
     * @return $this
     */
    public function setSourceMedia(string $sourceMedia)
    {
        $this->setParameter('SourceMedia', $sourceMedia);

        return $this;
    }

    /**
     * @param float $sourceMediaStartTime
     *
     * @return $this
     */
    public function setSourceMediaStartTime(float $sourceMediaStartTime)
    {
        $this->setParameter('SourceMediaStartTime', $sourceMediaStartTime);

        return $this;
    }

    /**
     * @param float $duration
     */
    public function setDuration(float $duration)
    {
        $this->setParameter('Duration', $duration);
    }

    /**
     * @param array $audioOperations
     *
     * @return $this
     */
    public function setAudioOperations(array $audioOperations)
    {
        $result = [];
        foreach ($audioOperations as $audioOperation) {
            $result[] = $audioOperation instanceof AudioTransform ? $audioOperation->getParameters() : $audioOperation;
        }

        $this->setParameter('AudioOperations', $result);

        return $this;
    }
}
