<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Profile;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class PortraitGetResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\Profile
 */
class PortraitGetResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getUserProfileItem()
    {
        foreach ($this->content['UserProfileItem'] as &$userProfileItem) {
            $profileItem = [];
            foreach ($userProfileItem['ProfileItem'] as $item) {
                $profileItem[$item['Tag']] = $item['Value'];
            }
            $userProfileItem['ProfileItem'] = $profileItem;
        }

        return $this->content['UserProfileItem'];
    }
}
