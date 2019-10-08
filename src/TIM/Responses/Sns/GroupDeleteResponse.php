<?php

namespace BiuBiuJun\QCloud\TIM\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GroupDeleteResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\Sns
 */
class GroupDeleteResponse extends BaseResponse
{
    /**
     * @return int
     */
    public function getCurrentSequence()
    {
        return $this->content['CurrentSequence'];
    }
}
