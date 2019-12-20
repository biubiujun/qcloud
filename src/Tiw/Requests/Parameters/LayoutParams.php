<?php

namespace BiuBiuJun\QCloud\Tiw\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class LayoutParams
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests\Parameters
 */
class LayoutParams extends BaseParameter
{
    /**
     * LayoutParams constructor.
     *
     * @param int $width
     * @param int $height
     * @param int $x
     * @param int $y
     * @param int $zOrder
     */
    public function __construct(int $width, int $height, int $x = 0, int $y = 0, int $zOrder = 0)
    {
        $this->setWidth($width)
            ->setHeight($height)
            ->setX($x)
            ->setY($y)
            ->setZOrder($zOrder);
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

    /**
     * @param int $x
     *
     * @return $this
     */
    public function setX(int $x)
    {
        $this->setParameter('X', $x);

        return $this;
    }

    /**
     * @param int $y
     *
     * @return $this
     */
    public function setY(int $y)
    {
        $this->setParameter('Y', $y);

        return $this;
    }

    /**
     * @param int $zOrder
     *
     * @return $this
     */
    public function setZOrder(int $zOrder)
    {
        $this->setParameter('ZOrder', $zOrder);

        return $this;
    }
}
