<?php

namespace BiuBiuJun\QCloud\Kernel;

class TICSign
{
    /**
     * @var string
     */
    private $ticKey;

    public function __construct(string $ticKey)
    {
        $this->ticKey = $ticKey;
    }

    public function sign(int $expireTime)
    {
        return md5($this->ticKey . $expireTime);
    }

    public function validate(string $sign, int $expireTime)
    {
        return $sign == $this->sign($expireTime);
    }
}
