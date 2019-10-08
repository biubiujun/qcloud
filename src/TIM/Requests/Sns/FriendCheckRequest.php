<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class FriendCheckRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\Sns
 */
class FriendCheckRequest extends BaseRequest
{
    /**
     * FriendCheckRequest constructor.
     *
     * @param string       $fromAccount
     * @param string|array $toAccount
     * @param string       $checkType
     */
    public function __construct(string $fromAccount, $toAccount, string $checkType)
    {
        $this->setFromAccount($fromAccount)
            ->setToAccount($toAccount)
            ->setCheckType($checkType);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_check';
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
     * @param string $checkType
     *
     * @return $this
     */
    public function setCheckType(string $checkType)
    {
        $this->setParameter('CheckType', $checkType);

        return $this;
    }
}
