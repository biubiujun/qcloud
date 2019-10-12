<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class Text
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters\MsgElements
 */
class Text extends MsgElement
{
    /**
     * Text constructor.
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->setMsgContent([
            'Text' => $text,
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMTextElem';
    }
}
