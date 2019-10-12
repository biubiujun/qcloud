<?php

namespace BiuBiuJun\QCloud\TIM\Parameters\MsgElements;

/**
 * Class Image
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters\MsgElements
 */
class Image extends MsgElement
{
    /**
     * Image constructor.
     *
     * @param string                                                 $uuid
     * @param int                                                    $imageFormat
     * @param \BiuBiuJun\QCloud\TIM\Parameters\MsgElements\ImageItem $imageInfoArray
     */
    public function __construct(string $uuid, int $imageFormat, ImageItem $imageInfoArray)
    {
        $this->setMsgContent([
            'UUID' => $uuid,
            'ImageFormat' => $imageFormat,
            'ImageInfoArray' => $imageInfoArray->getParameters(),
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMImageElem';
    }
}
