<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AiContentReviewTaskInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process
 */
class AiContentReviewTaskInput extends BaseParameter
{
    /**
     * AiContentReviewTaskInput constructor.
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
