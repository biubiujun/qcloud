<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class MsgElement
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements
 */
abstract class MsgElement implements MsgElementInterface
{
    /**
     * @var array
     */
    protected $msgContent;

    /**
     * @param array $msgContent
     */
    protected function setMsgContent(array $msgContent)
    {
        $this->msgContent = $msgContent;
    }

    /**
     * @return array
     */
    protected function getMsgContent()
    {
        return $this->msgContent;
    }

    /**
     * @return array
     */
    public function transform()
    {
        return [
            'MsgType' => $this->getMsgType(),
            'MsgContent' => $this->getMsgContent(),
        ];
    }
}
