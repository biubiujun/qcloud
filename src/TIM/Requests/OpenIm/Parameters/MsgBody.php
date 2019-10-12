<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;
use BiuBiuJun\QCloud\TIM\Parameters\MsgElements\MsgElement;

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
     * @param array|\BiuBiuJun\QCloud\TIM\Parameters\MsgElements\MsgElement $msgElements
     */
    public function __construct($msgElements)
    {
        $this->setMsgElements($msgElements);
    }

    /**
     * @param array|\BiuBiuJun\QCloud\TIM\Parameters\MsgElements\MsgElement $msgElements
     */
    public function setMsgElements($msgElements)
    {
        if ($msgElements instanceof MsgElement) {
            $this->parameters[] = $msgElements->transform();
        } elseif (is_array($msgElements)) {
            $parameters = [];
            foreach ($msgElements as $msgElement) {
                if ($msgElement instanceof MsgElement) {
                    $parameters[] = $msgElement->transform();
                }
            }
            array_push($this->parameters, $parameters);
        }
    }
}
