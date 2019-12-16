<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class VideoTrackItem
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class VideoTrackItem extends BaseParameter
{
    /**
     * VideoTrackItem constructor.
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
     *
     * @return $this
     */
    public function setDuration(float $duration)
    {
        $this->setParameter('Duration', $duration);

        return $this;
    }

    /**
     * @param string $coordinateOrigin
     *
     * @return $this
     */
    public function setCoordinateOrigin(string $coordinateOrigin)
    {
        $this->setParameter('CoordinateOrigin', $coordinateOrigin);

        return $this;
    }

    /**
     * @param string $xPos
     *
     * @return $this
     */
    public function setXPos(string $xPos)
    {
        $this->setParameter('XPos', $xPos);

        return $this;
    }

    /**
     * @param string $yPos
     *
     * @return $this
     */
    public function setYPos(string $yPos)
    {
        $this->setParameter('YPos', $yPos);

        return $this;
    }

    /**
     * @param string $width
     *
     * @return $this
     */
    public function setWidth(string $width)
    {
        $this->setParameter('Width', $width);

        return $this;
    }

    /**
     * @param string $height
     *
     * @return $this
     */
    public function setHeight(string $height)
    {
        $this->setParameter('Height', $height);

        return $this;
    }

    /**
     * @param array $imageOperations
     *
     * @return $this
     */
    public function setImageOperations(array $imageOperations)
    {
        $result = [];
        foreach ($imageOperations as $imageOperation) {
            $result[] = $imageOperation instanceof ImageTransform ? $imageOperation->getParameters() : $imageOperation;
        }

        $this->setParameter('ImageOperations', $result);

        return $this;
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
