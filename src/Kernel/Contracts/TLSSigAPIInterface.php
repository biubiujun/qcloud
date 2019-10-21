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
    public function genSig(string $identifier, int $expire = 15552000);

    /**
     * @param string $identifier
     * @param int    $expire
     * @param string $userBuf
     *
     * @return string
     */
    public function genSigWithUserBuf(string $identifier, int $expire, string $userBuf);

    /**
     * @param string $sig
     * @param string $identifier
     * @param int $initTime
     * @param int $expireTime
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verifySig(string $sig, string $identifier, &$initTime, &$expireTime, &$errorMsg);

    /**
     * @param string $sig
     * @param string $identifier
     * @param int $initTime
     * @param int $expireTime
     * @param string $userBuf
     * @param string $errorMsg
     *
     * @return bool
     */
    public function verifySigWithUserBuf(string $sig, string $identifier, &$initTime, &$expireTime, &$userBuf, &$errorMsg);
}
