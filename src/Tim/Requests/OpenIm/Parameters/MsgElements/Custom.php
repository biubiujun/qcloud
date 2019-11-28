<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class Custom
 *
 * @package BiuBiuJun\QCloud\TimClient\Parameters\MsgElements
 */
class Custom extends MsgElement
{
    /**
     * Custom constructor.
     *
     * @param string $data
     * @param string $desc
     * @param string $ext
     * @param string $sound
     */
    public function __construct(string $data, string $desc, string $ext, string $sound)
    {
        $this->setMsgContent([
            'Data' => $data,
            'Desc' => $desc,
            'Ext' => $ext,
            'Sound' => $sound,
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMCustomElem';
    }
}
