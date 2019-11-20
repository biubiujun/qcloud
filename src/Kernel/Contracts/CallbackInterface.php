<?php

namespace BiuBiuJun\QCloud\Kernel\Contracts;

/**
 * Interface RequestInterface
 *
 * @package BiuBiuJun\QCloud\Kernel\Contracts
 */
interface CallbackInterface
{
    public function success($response);

    public function error($reason);
}
