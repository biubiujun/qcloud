<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Kernel\Contracts\RequestInterface;

/**
 * Class BaseRequest
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
abstract class BaseRequest implements RequestInterface
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
     * @param null   $default
     *
     * @return mixed
     */
    protected function getParameter(string $key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
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
