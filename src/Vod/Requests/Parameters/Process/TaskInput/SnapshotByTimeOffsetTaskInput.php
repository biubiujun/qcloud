<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class SnapshotByTimeOffsetTaskInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput
 */
class SnapshotByTimeOffsetTaskInput extends BaseParameter
{
    /**
     * SnapshotByTimeOffsetTaskInput constructor.
     *
     * @param int   $definition
     * @param array $timeOffsetSet
     */
    public function __construct(int $definition, array $timeOffsetSet)
    {
        $this->setDefinition($definition)
            ->setTimeOffsetSet($timeOffsetSet);
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
     * @param array $timeOffsetSet
     *
     * @return $this
     */
    public function setTimeOffsetSet(array $timeOffsetSet)
    {
        $this->setParameter('TimeOffsetSet', $timeOffsetSet);

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
