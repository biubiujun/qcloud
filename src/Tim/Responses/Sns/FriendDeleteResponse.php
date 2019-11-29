<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class FriendDeleteResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\Sns
 */
class FriendDeleteResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
