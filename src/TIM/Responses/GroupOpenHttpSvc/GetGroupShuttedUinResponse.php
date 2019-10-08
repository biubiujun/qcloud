<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetGroupShuttedUinResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc
 */
class GetGroupShuttedUinResponse extends BaseResponse
{
    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->content['GroupId'];
    }

    /**
     * @return array
     */
    public function getShuttedUinList()
    {
        return $this->content['ShuttedUinList'];
    }
}
