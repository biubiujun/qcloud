<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class BlackListAddResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\Sns
 */
class BlackListAddResponse extends BaseResponse
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
