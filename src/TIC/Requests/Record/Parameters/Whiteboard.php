<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class Whiteboard
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Record\Parameters
 */
class Whiteboard extends BaseParameter
{
    /**
     * Whiteboard constructor.
     *
     * @param int    $width
     * @param int    $height
     * @param string $initParam
     */
    public function __construct(int $width, int $height, string $initParam)
    {
        $this->setWidth($width)
            ->setHeight($height)
            ->setInitParam($initParam);
    }

    /**
     * @param int $width
     *
     * @return $this
     */
    public function setWidth(int $width)
    {
        $this->setParameter('width', $width);

        return $this;
    }

    /**
     * @param int $height
     *
     * @return $this
     */
    public function setHeight(int $height)
    {
        $this->setParameter('height', $height);

        return $this;
    }

    /**
     * @param string $initParam
     *
     * @return $this
     */
    public function setInitParam(string $initParam)
    {
        $this->setParameter('init_param', $initParam);

        return $this;
    }
}