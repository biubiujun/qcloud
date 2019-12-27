<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MediaDeleteItem
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class MediaDeleteItem extends BaseParameter
{
    /**
     * MediaDeleteItem constructor.
     *
     * @param string $type
     */
    public function __construct(string $type, int $definition = 0)
    {
        $this->setType($type)
            ->setDefinition($definition);
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->setParameter('Type', $type);

        return $this;
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
