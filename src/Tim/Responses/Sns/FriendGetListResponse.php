<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class FriendGetListResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\Sns
 */
class FriendGetListResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getInfoItem()
    {
        return $this->content['InfoItem'];
    }
}
