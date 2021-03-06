<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class Face
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements
 */
class Face extends MsgElement
{
    /**
     * Face constructor.
     *
     * @param int    $index
     * @param string $data
     */
    public function __construct(int $index, string $data)
    {
        $this->setMsgContent([
            'Index' => $index,
            'Data' => $data,
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMFaceElem';
    }
}
