<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AnimatedGraphicTaskInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput
 */
class AnimatedGraphicTaskInput extends BaseParameter
{
    /**
     * AnimatedGraphicTaskInput constructor.
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
     * @param float $startTimeOffset
     *
     * @return $this
     */
    public function setStartTimeOffset(float $startTimeOffset)
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
