<?php

namespace BiuBiuJun\QCloud\Tiw\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class Whiteboard
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests\Parameters
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
    public function __construct(int $width = 0, int $height = 0, string $initParam = '')
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
     * @param string $initParam
     *
     * @return $this
     */
    public function setInitParam(string $initParam)
    {
        $this->setParameter('InitParam', $initParam);

        return $this;
    }
}
