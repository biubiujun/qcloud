<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class FriendDeleteRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\Sns
 */
class FriendDeleteRequest extends BaseRequest
{
    /**
     * FriendDeleteRequest constructor.
     *
     * @param string       $fromAccount
     * @param string|array $toAccount
     * @param string       $deleteType
     */
    public function __construct(string $fromAccount, $toAccount, string $deleteType = '')
    {
        $this->setFromAccount($fromAccount)
            ->setToAccount($toAccount)
            ->setDeleteType($deleteType);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_delete';
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
     * @param string|array $toAccount
     *
     * @return $this
     */
    public function setToAccount($toAccount)
    {
        $this->setParameter('To_Account', is_array($toAccount) ? $toAccount : [$toAccount]);

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
