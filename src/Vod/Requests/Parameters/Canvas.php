<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class Canvas
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class Canvas extends BaseParameter
{
    /**
     * Canvas constructor.
     *
     * @param int    $width
     * @param int    $height
     * @param string $color
     */
    public function __construct(int $width, int $height, string $color)
    {
        $this->setColor($color)
            ->setWidth($width)
            ->setHeight($height);
    }

    /**
     * @param string $color
     *
     * @return $this
     */
    public function setColor(string $color)
    {
        $this->setParameter('Color', $color);

        return $this;
    }

    /**
     * @param int $width
     *
     * @return $this
     */
    public function setWidth(int $width)
    {
        $this->setParameter('Width', $width);

        return $this;
    }

    /**
     * @param int $height
     *
     * @return $this
     */
    public function setHeight(int $height)
    {
        $this->setParameter('Height', $height);

        return $this;
    }
}
