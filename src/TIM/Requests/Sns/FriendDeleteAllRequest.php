<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class FriendDeleteAllRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\Sns
 */
class FriendDeleteAllRequest extends BaseRequest
{
    /**
     * FriendDeleteRequest constructor.
     *
     * @param string $fromAccount
     * @param string $deleteType
     */
    public function __construct(string $fromAccount, string $deleteType = '')
    {
        $this->setFromAccount($fromAccount)
            ->setDeleteType($deleteType);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_delete_all';
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
     * @param string $deleteType
     *
     * @return $this
     */
    public function setDeleteType(string $deleteType)
    {
        $this->setParameter('DeleteType', $deleteType);

        return $this;
    }
}
