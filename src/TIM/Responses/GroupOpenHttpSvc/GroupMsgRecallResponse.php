<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GroupMsgRecallResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc
 */
class GroupMsgRecallResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getRecallRetList()
    {
        return $this->content['RecallRetList'];
    }
}
