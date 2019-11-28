<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class FriendGetRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\Sns
 */
class FriendGetRequest extends BaseRequest
{
    /**
     * FriendGetRequest constructor.
     *
     * @param string $fromAccount
     * @param int    $startIndex
     * @param int    $standardSequence
     * @param int    $customSequence
     */
    public function __construct(string $fromAccount, int $startIndex = 0, int $standardSequence = 0, int $customSequence = 0)
    {
        $this->setFromAccount($fromAccount)
            ->setStartIndex($startIndex)
            ->setStandardSequence($standardSequence)
            ->setCustomSequence($customSequence);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_get';
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
     * @param int $startIndex
     *
     * @return $this
     */
    public function setStartIndex(int $startIndex)
    {
        $this->setParameter('StartIndex', $startIndex);

        return $this;
    }

    /**
     * @param int $standardSequence
     *
     * @return $this
     */
    public function setStandardSequence(int $standardSequence)
    {
        $this->setParameter('StandardSequence', $standardSequence);

        return $this;
    }

    /**
     * @param int $customSequence
     *
     * @return $this
     */
    public function setCustomSequence(int $customSequence)
    {
        $this->setParameter('CustomSequence', $customSequence);

        return $this;
    }
}
