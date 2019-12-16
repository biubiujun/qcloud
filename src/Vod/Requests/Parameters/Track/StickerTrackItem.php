<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class StickerTrackItem
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class StickerTrackItem extends BaseParameter
{
    /**
     * StickerTrackItem constructor.
     *
     * @param string $sourceMedia
     * @param float  $duration
     */
    public function __construct(string $sourceMedia, float $duration)
    {
        $this->setSourceMedia($sourceMedia)
            ->setDuration($duration);
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
     * @param float $startTime
     *
     * @return $this
     */
    public function setStartTime(float $startTime)
    {
        $this->setParameter('StartTime', $startTime);

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
}
