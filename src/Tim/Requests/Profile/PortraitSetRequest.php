<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Profile;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Tim\Requests\Profile\Parameters\ProfileItem;

/**
 * Class PortraitSetRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\Profile
 */
class PortraitSetRequest extends BaseRequest
{
    /**
     * PortraitSetRequest constructor.
     *
     * @param string                                                        $fromAccount
     * @param \BiuBiuJun\QCloud\Tim\Requests\Profile\Parameters\ProfileItem $profileItem
     */
    public function __construct(string $fromAccount, ProfileItem $profileItem)
    {
        $this->setFromAccount($fromAccount)
            ->setProfileItem($profileItem);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/profile/portrait_set';
    }

    /**
     * @param string $fromAccount
     *
     * @return $this
     */
    public function setFromAccount(string $fromAccount)
    {
        $this->setParameter('From_Account', $fromAccount);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Tim\Requests\Profile\Parameters\ProfileItem $profileItem
     *
     * @return $this
     */
    public function setProfileItem(ProfileItem $profileItem)
    {
        $this->setParameter('ProfileItem', $profileItem->transform());

        return $this;
    }
}
