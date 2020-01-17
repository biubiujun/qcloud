<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AiRecognitionTaskInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process
 */
class AiRecognitionTaskInput extends BaseParameter
{
    /**
     * AiRecognitionTaskInput constructor.
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
}
