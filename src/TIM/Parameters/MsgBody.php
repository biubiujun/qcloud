<?php

namespace BiuBiuJun\QCloud\TIM\Parameters;

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
     * @param array $msgElements
     */
    public function __construct(array $msgElements)
    {
        $this->setMsgElements($msgElements);
    }

    /**
     * @param array $msgElements
     */
    public function setMsgElements(array $msgElements)
    {
        $parameters = [];
        foreach ($msgElements as $msgElement) {
            if ($msgElement instanceof MsgElement) {
                $parameters[] = $msgElement->transform();
            }
        }

        $this->parameters = $parameters;
    }
}
