<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements;

/**
 * Interface MsgElementInterface
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements
 */
interface MsgElementInterface
{
    /**
     * @return string
     */
    public function getMsgType(): string;
}
