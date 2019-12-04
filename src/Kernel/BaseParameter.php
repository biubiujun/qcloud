<?php

namespace BiuBiuJun\QCloud\Kernel;

/**
 * Class BaseParameter
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
abstract class BaseParameter
{
    protected $parameters = [];

    /**
     * @param bool $filter
     *
     * @return array
     */
    public function getParameters($filter = true)
    {
        return (true === $filter && $this->parameters) ? array_filter($this->parameters) : $this->parameters;
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
