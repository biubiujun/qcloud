<?php

namespace BiuBiuJun\QCloud\TIM\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GroupAddResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class GroupAddResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }

    /**
     * @return array
     */
    public function getFailAccount()
    {
        return $this->content['Fail_Account'];
    }

    /**
     * @return array
     */
    public function getInvalidAccount()
    {
        return $this->content['Invalid_Account'];
    }
    /**
     * @return int
     */
    public function getCurrentSequence()
    {
        return $this->content['CurrentSequence'];
    }
}
