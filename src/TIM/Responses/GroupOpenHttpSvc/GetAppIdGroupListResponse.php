<?php

namespace BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetAppIdGroupListResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc
 */
class GetAppIdGroupListResponse extends BaseResponse
{
    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->content['TotalCount'];
    }

    /**
     * @return array
     */
    public function getGroupIdList()
    {
        return $this->content['GroupIdList'];
    }

    /**
     * @return string
     */
    public function getNext()
    {
        return $this->content['Next'];
    }
}
