<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class FriendUpdateResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\Sns
 */
class FriendUpdateResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
