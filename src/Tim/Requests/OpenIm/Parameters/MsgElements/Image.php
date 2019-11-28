<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class Image
 *
 * @package BiuBiuJun\QCloud\TimClient\Parameters\MsgElements
 */
class Image extends MsgElement
{
    /**
     * Image constructor.
     *
     * @param string                                                                 $uuid
     * @param int                                                                    $imageFormat
     * @param \BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements\ImageItem $imageInfoArray
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
