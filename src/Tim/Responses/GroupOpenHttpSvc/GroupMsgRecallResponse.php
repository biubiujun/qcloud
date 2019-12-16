<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GroupMsgRecallResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc
 */
class GroupMsgRecallResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getRecallRetList()
    {
        return $this->content['RecallRetList'];
    }
}
