<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GroupDeleteRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\Sns
 */
class GroupDeleteRequest extends BaseRequest
{
    /**
     * GroupAddRequest constructor.
     *
     * @param string $fromAccount
     * @param array  $groupName
     */
    public function __construct(string $fromAccount, array $groupName)
    {
        $this->setFromAccount($fromAccount)
            ->setGroupName($groupName);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/group_delete';
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
}
