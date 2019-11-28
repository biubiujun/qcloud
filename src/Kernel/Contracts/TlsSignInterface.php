<?php

namespace BiuBiuJun\QCloud\Kernel\Contracts;

/**
 * Interface TlsSignInterface
 *
 * @package BiuBiuJun\QCloud\Kernel\Contracts
 */
interface TlsSignInterface
{
    /**
     * @param string $identifier
     * @param int    $expire
     * @param string $userBuf
     *
     * @return string
     */
    public function sign(string $identifier, int $expire = 15552000, string $userBuf = '');

    /**
     * @param string $sign
     * @param string $identifier
     * @param bool   $userBufEnabled
     *
     * @return bool
     */
    public function verify(string $sign, string $identifier, bool $userBufEnabled = false);
}
