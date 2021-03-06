<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class BlackListAddResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\Sns
 */
class BlackListAddResponse extends TimResponse
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

    /**
     * @return array
     */
    public function getInvalidAccount()
    {
        return $this->content['Invalid_Account'];
    }
}
