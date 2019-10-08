<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ChangeGroupOwnerRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class ChangeGroupOwnerRequest extends BaseRequest
{
    /**
     * ChangeGroupOwnerRequest constructor.
     *
     * @param string $groupId
     * @param string $newOwnerAccount
     */
    public function __construct(string $groupId, string $newOwnerAccount)
    {
        $this->$this->setGroupId($groupId)
            ->setNewOwnerAccount($newOwnerAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/change_group_owner';
    }

    /**
     * @param string $groupId
     *
     * @return $this
     */
    public function setGroupId(string $groupId)
    {
        $this->setParameter('GroupId', $groupId);

        return $this;
    }

    /**
     * @param string $newOwnerAccount
     *
     * @return $this
     */
    public function setNewOwnerAccount(string $newOwnerAccount)
    {
        $this->setParameter('NewOwner_Account', $newOwnerAccount);

        return $this;
    }
}
