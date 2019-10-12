<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements\MsgElement;

/**
 * Class MsgBody
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters
 */
class MsgBody extends BaseParameter
{
    /**
     * MsgBody constructor.
     *
     * @param array|\BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements\MsgElement $msgElements
     */
    public function __construct($msgElements)
    {
        $this->setMsgElements($msgElements);
    }

    /**
     * @param array|\BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements\MsgElement $msgElements
     */
    public function setMsgElements($msgElements)
    {
        if ($msgElements instanceof MsgElement) {
            $this->parameters[] = $msgElements->transform();
        } elseif (is_array($msgElements)) {
            foreach ($msgElements as $msgElement) {
                $this->parameters[] = $msgElement instanceof MsgElement ? $msgElement->transform() : $msgElement;
            }
        }
    }
}
