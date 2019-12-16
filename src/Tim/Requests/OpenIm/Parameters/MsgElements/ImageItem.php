<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class ImageItem
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements
 */
class ImageItem
{
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * ImageItem constructor.
     *
     * @param int    $type
     * @param int    $size
     * @param int    $width
     * @param int    $height
     * @param string $url
     */
    public function __construct(int $type, int $size, int $width, int $height, string $url)
    {
        $this->parameters[] = [
            'Type' => $type,
            'Size' => $size,
            'Width' => $width,
            'Height' => $height,
            'URL' => $url,

        ];
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
