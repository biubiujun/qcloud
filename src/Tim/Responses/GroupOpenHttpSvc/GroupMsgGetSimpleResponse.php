<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GroupMsgGetSimpleResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc
 */
class GroupMsgGetSimpleResponse extends TimResponse
{
    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['GroupId'];
    }

    /**
     * @return int
     */
    public function getIsFinished()
    {
        return $this->content['IsFinished'];
    }

    /**
     * @return array
     */
    public function getRspMsgList()
    {
        return $this->content['RspMsgList'];
    }
}
