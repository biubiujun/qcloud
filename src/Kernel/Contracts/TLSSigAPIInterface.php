<?php

namespace BiuBiuJun\QCloud\Kernel\Contracts;

/**
 * Interface TLSSigAPIInterface
 *
 * @package BiuBiuJun\QCloud\Kernel\Contracts
 */
interface TLSSigAPIInterface
{
    /**
     * @param string $identifier
     * @param int    $expire
     *
     * @return string
     */
    public function generate(string $identifier, int $expire = 15552000);

    /**
     * @param string $sig
     * @param string $identifier
     * @param string $initTime
     * @param string $expireTime
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verify(string $sig, string $identifier, &$initTime, &$expireTime, &$errorMsg);
}
