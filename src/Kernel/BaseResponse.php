<?php

namespace BiuBiuJun\QCloud\Kernel;

use BiuBiuJun\QCloud\Exceptions\BadRequestException;
use BiuBiuJun\QCloud\Exceptions\HttpException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseResponse
 *
 * @package BiuBiuJun\QCloud\Kernel
 */
abstract class BaseResponse
{
    /**
     * @var bool
     */
    protected $hasActionStatus = true;

    /**
     * @var bool
     */
    protected $isSuccessful;

    /**
     * @var array
     */
    protected $content;

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     */
    abstract public function handle(ResponseInterface $response);

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->isSuccessful;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }
}
