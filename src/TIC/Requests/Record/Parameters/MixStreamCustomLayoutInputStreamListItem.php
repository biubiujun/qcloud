<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

class MixStreamCustomLayoutInputStreamListItem extends BaseParameter
{
    private $layOutParams = [];

    public function __construct(
        string $inputStreamId,
        int $layoutParamsWidth,
        int $layoutParamsHeight,
        int $layoutParamsX,
        int $layoutParamsY,
        int $layoutParamsZOrder
    ) {
        $this->setInputStreamId($inputStreamId)
            ->setLayoutParamsWidth($layoutParamsWidth)
            ->setLayoutParamsHeight($layoutParamsHeight)
            ->setLayoutParamsX($layoutParamsX)
            ->setLayoutParamsY($layoutParamsY)
            ->setLayoutParamsZOrder($layoutParamsZOrder);
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
     * @param int $layoutParamsX
     *
     * @return $this
     */
    public function setLayoutParamsX(int $layoutParamsX)
    {
        $this->layOutParams['x'] = $layoutParamsX;
        $this->setParameter('layout_params', $this->layOutParams);

        return $this;
    }

    /**
     * @param int $layoutParamsY
     *
     * @return $this
     */
    public function setLayoutParamsY(int $layoutParamsY)
    {
        $this->layOutParams['y'] = $layoutParamsY;
        $this->setParameter('layout_params', $this->layOutParams);

        return $this;
    }

    /**
     * @param int $layoutParamsZOrder
     *
     * @return $this
     */
    public function setLayoutParamsZOrder(int $layoutParamsZOrder)
    {
        $this->layOutParams['z_order'] = $layoutParamsZOrder;
        $this->setParameter('layout_params', $this->layOutParams);

        return $this;
    }

    /**
     * @param string $inputStreamId
     *
     * @return $this
     */
    public function setInputStreamId(string $inputStreamId)
    {
        $this->setParameter('input_stream_id', $inputStreamId);

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
