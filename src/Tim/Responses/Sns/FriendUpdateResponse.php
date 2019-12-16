<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class FriendUpdateResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\Sns
 */
class FriendUpdateResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getResultItem()
    {
        return $this->content['ResultItem'];
    }
}
