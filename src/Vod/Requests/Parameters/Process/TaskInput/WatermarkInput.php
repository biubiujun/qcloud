<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class WatermarkInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput
 */
class WatermarkInput extends BaseParameter
{
    /**
     * WatermarkInput constructor.
     *
     * @param int $definition
     */
    public function __construct(int $definition)
    {
        $this->setDefinition($definition);
    }

    /**
     * @param int $definition
     *
     * @return $this
     */
    public function setDefinition(int $definition)
    {
        $this->setParameter('Definition', $definition);

        return $this;
    }

    /**
     * @param string $textContent
     *
     * @return $this
     */
    public function setTextContent(string $textContent)
    {
        $this->setParameter('TextContent', $textContent);

        return $this;
    }

    /**
     * @param string $svgContent
     *
     * @return $this
     */
    public function setSvgContent(string $svgContent)
    {
        $this->setParameter('SvgContent', $svgContent);

        return $this;
    }

    /**
     * @param float $startTimeOffset
     *
     * @return $this
     */
    public function setStarTimeOffset(float $startTimeOffset)
    {
        $this->setParameter('StartTimeOffset', $startTimeOffset);

        return $this;
    }

    /**
     * @param float $endTimeOffset
     *
     * @return $this
     */
    public function setEndTimeOffset(float $endTimeOffset)
    {
        $this->setParameter('EndTimeOffset', $endTimeOffset);

        return $this;
    }
}
