<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class ImageTransform
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class ImageTransform extends BaseParameter
{
    /**
     * ImageTransform constructor.
     *
     * @param string $type
     * @param string $flip
     */
    public function __construct(string $type, string $flip)
    {
        $this->setType($type)
            ->setFlip($flip);
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
     * @param float $rotateAngle
     *
     * @return $this
     */
    public function setRotateAngle(float $rotateAngle)
    {
        $this->setParameter('RotateAngle', $rotateAngle);

        return $this;
    }

    /**
     * @param string $flip
     *
     * @return $this
     */
    public function setFlip(string $flip)
    {
        $this->setParameter('Flip', $flip);

        return $this;
    }
}
