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
    /**
     * @var array
     */
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

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '';
    }
}
