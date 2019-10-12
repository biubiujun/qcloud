<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class Location
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters\MsgElements
 */
class Location extends MsgElement
{
    /**
     * Location constructor.
     *
     * @param string $desc
     * @param float  $latitude
     * @param float  $longitude
     */
    public function __construct(string $desc, $latitude, $longitude)
    {
        $this->setMsgContent([
            'Desc' => $desc,
            'Latitude' => $latitude,
            'Longitude' => $longitude,
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMLocationElem';
    }
}
