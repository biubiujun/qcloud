<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GroupAddRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\Sns
 */
class GroupAddRequest extends BaseRequest
{
    /**
     * GroupAddRequest constructor.
     *
     * @param string       $fromAccount
     * @param array        $groupName
     * @param string|array $toAccount
     */
    public function __construct(string $fromAccount, array $groupName, $toAccount = [])
    {
        $this->setFromAccount($fromAccount)
            ->setGroupName($groupName)
            ->setToAccount($toAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/group_add';
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
     * @param array $groupName
     *
     * @return $this
     */
    public function setGroupName(array $groupName)
    {
        $this->setParameter('GroupName', $groupName);

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
}
