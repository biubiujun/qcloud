<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\SetAddFriendItem;

/**
 * Class FriendAddRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\Sns
 */
class FriendAddRequest extends BaseRequest
{
    use SetAddFriendItem;

    /**
     * FriendAddRequest constructor.
     *
     * @param string                                                         $fromAccount
     * @param array|\BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendItem $addFriendItem
     */
    public function __construct(string $fromAccount, $addFriendItem)
    {
        $this->setFromAccount($fromAccount)
            ->setAddFriendItem($addFriendItem);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_add';
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
     * @param string $addType
     *
     * @return $this
     */
    public function setAddType(string $addType)
    {
        $this->setParameter('AddType', $addType);

        return $this;
    }

    /**
     * @param int $forceAddFlags
     *
     * @return $this
     */
    public function setForceAddFlags(int $forceAddFlags)
    {
        $this->setParameter('ForceAddFlags', $forceAddFlags);

        return $this;
    }
}
