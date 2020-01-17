<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class CoverBySnapshotTaskInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput
 */
class CoverBySnapshotTaskInput extends BaseParameter
{
    /**
     * CoverBySnapshotTaskInput constructor.
     *
     * @param int    $definition
     * @param string $positionType
     * @param float  $positionValue
     */
    public function __construct(int $definition, string $positionType, float $positionValue)
    {
        $this->setDefinition($definition)
            ->setPositionType($positionType)
            ->setPositionValue($positionValue);
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
     * @param string $positionType
     *
     * @return $this
     */
    public function setPositionType(string $positionType)
    {
        $this->setParameter('PositionType', $positionType);

        return $this;
    }

    /**
     * @param float $positionValue
     *
     * @return $this
     */
    public function setPositionValue(float $positionValue)
    {
        $this->setParameter('PositionValue', $positionValue);

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
