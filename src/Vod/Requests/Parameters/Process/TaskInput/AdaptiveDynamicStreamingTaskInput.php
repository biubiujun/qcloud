<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AdaptiveDynamicStreamingTaskInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput
 */
class AdaptiveDynamicStreamingTaskInput extends BaseParameter
{
    /**
     * AdaptiveDynamicStreamingTaskInput constructor.
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
     * @param array $watermarkSets
     *
     * @return $this
     */
    public function setWatermarkSet(array $watermarkSets)
    {
        $result = [];
        foreach ($watermarkSets as $watermarkSet) {
            $result[] = $watermarkSet instanceof WatermarkInput ? $watermarkSet->getParameters() : $watermarkSet;
        }

        $this->setParameter('WatermarkSet', $result);

        return $this;
    }
}
