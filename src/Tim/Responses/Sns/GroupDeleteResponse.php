<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GroupDeleteResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\Sns
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
