<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class Sound
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters\MsgElements
 */
class Sound extends MsgElement
{
    /**
     * Sound constructor.
     *
     * @param string $url
     * @param int    $size
     * @param int    $second
     * @param int    $downloadFlag
     */
    public function __construct(string $url, int $size, int $second, int $downloadFlag)
    {
        $this->setMsgContent([
            'Url' => $url,
            'Size' => $size,
            'Second' => $second,
            'Download_Flag' => $downloadFlag,
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMSoundElem';
    }
}
