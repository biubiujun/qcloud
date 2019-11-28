<?php

namespace BiuBiuJun\QCloud\Kernel\Sign;

/**
 * Class TicSign
 *
 * @package BiuBiuJun\QCloud\Kernel\Sign
 */
class TicSign
{
    /**
     * @var string
     */
    protected $ticKey;

    /**
     * TicSign constructor.
     *
     * @param string $ticKey
     */
    public function __construct(string $ticKey)
    {
        $this->ticKey = $ticKey;
    }

    /**
     * @param int $expireTime
     *
     * @return string
     */
    public function sign(int $expireTime)
    {
        return md5($this->ticKey . $expireTime);
    }

    /**
     * @param string $sign
     * @param int    $expireTime
     *
     * @return bool
     */
    public function verify(string $sign, int $expireTime)
    {
        return $sign == $this->sign($expireTime);
    }
}
