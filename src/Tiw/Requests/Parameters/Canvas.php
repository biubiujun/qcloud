<?php

namespace BiuBiuJun\QCloud\Tiw\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class Canvas
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests\Parameters
 */
class Canvas extends BaseParameter
{
    /**
     * Canvas constructor.
     *
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\LayoutParams $layoutParams
     * @param string                                                 $backgroundColor
     */
    public function __construct(LayoutParams $layoutParams, string $backgroundColor = '')
    {
        $this->setLayoutParams($layoutParams)
            ->setBackgroundColor($backgroundColor);
    }

    /**
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\LayoutParams $layoutParams
     *
     * @return $this
     */
    public function setLayoutParams(LayoutParams $layoutParams)
    {
        $this->setParameter('LayoutParams', $layoutParams->getParameters());

        return $this;
    }

    /**
     * @param string $backgroundColor
     *
     * @return $this
     */
    public function setBackgroundColor(string $backgroundColor)
    {
        $this->setParameter('BackgroundColor', $backgroundColor);

        return $this;
    }
}
