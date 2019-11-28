<?php

namespace BiuBiuJun\QCloud\Kernel\Contracts;

/**
 * Interface RequestInterface
 *
 * @package BiuBiuJun\QCloud\Kernel\Contracts
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getUri(): string;

    /**
     * @return string
     */
    public function getAction(): string;

    /**
     * @return string
     */
    public function getRegion(): string;

    /**
     * @return string
     */
    public function getVersion(): string;
}
