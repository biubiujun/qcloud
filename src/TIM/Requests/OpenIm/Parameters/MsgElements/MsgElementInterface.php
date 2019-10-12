<?php

namespace BiuBiuJun\QCloud\TIM\Parameters\MsgElements;

/**
 * Interface MsgElementInterface
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters\MsgElements
 */
interface MsgElementInterface
{
    /**
     * @return string
     */
    public function getMsgType(): string;
}
