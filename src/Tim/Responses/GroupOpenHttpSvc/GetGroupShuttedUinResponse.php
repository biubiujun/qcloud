<?php

namespace BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GetGroupShuttedUinResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\GroupOpenHttpSvc
 */
class GetGroupShuttedUinResponse extends TimResponse
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
