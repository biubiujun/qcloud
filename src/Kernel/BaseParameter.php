<?php

namespace BiuBiuJun\QCloud\Kernel;

/**
 * Class BaseParameter
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
abstract class BaseParameter
{
    protected $parameters;

    /**
     * @return array
     */
    public function getParameters()
    {
        return array_filter($this->parameters);
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function setParameter(string $key, $value)
    {
        $this->parameters[$key] = $value;
    }
}
