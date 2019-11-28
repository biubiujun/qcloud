<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GroupMsgRecallResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
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
