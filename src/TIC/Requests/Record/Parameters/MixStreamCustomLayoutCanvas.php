<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MixStreamCustomLayoutCanvas
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Record\Parameters
 */
class MixStreamCustomLayoutCanvas extends BaseParameter
{
    private $layOutParams = [];

    public function __construct(int $layoutParamsWidth, int $layoutParamsHeight)
    {
        $this->setLayoutParamsWidth($layoutParamsWidth)
            ->setLayoutParamsHeight($layoutParamsHeight);
    }

    /**
     * @param int $layoutParamsWidth
     *
     * @return $this
     */
    public function setLayoutParamsWidth(int $layoutParamsWidth)
    {
        $this->layOutParams['width'] = $layoutParamsWidth;
        $this->setParameter('layout_params', $this->layOutParams);

        return $this;
    }

    /**
     * @param int $layoutParamsHeight
     *
     * @return $this
     */
    public function setLayoutParamsHeight(int $layoutParamsHeight)
    {
        $this->layOutParams['height'] = $layoutParamsHeight;
        $this->setParameter('layout_params', $this->layOutParams);

        return $this;
    }

    /**
     * @param int $backgroundColor
     *
     * @return $this
     */
    public function setBackgroundColor(int $backgroundColor)
    {
        $this->setParameter('background_color', $backgroundColor);

        return $this;
    }
}
