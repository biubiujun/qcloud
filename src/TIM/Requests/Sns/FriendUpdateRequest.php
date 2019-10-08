<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class FriendUpdateRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\Sns
 */
class FriendUpdateRequest extends BaseRequest
{
    /**
     * FriendUpdateRequest constructor.
     *
     * @param string $fromAccount
     * @param array  $updateItem
     */
    public function __construct(string $fromAccount, array $updateItem)
    {
        $this->setFromAccount($fromAccount)
            ->setUpdateItem($updateItem);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_update';
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
     * @param array $updateItem
     *
     * @return $this
     */
    public function setUpdateItem(array $updateItem)
    {
        $this->setParameter('UpdateItem', $updateItem);

        return $this;
    }
}
