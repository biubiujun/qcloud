<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class FriendCheckResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\Sns
 */
class FriendCheckResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getInfoItem()
    {
        return $this->content['InfoItem'];
    }

    /**
     * @return array
     */
    public function getFailAccount()
    {
        return $this->content['Fail_Account'];
    }
}
