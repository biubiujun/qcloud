<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ModifyGroupMemberInfoRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc
 */
class ModifyGroupMemberInfoRequest extends BaseRequest
{
    /**
     * AddGroupMemberRequest constructor.
     *
     * @param string $groupId
     * @param string $memberAccount
     */
    public function __construct(string $groupId, string $memberAccount)
    {
        $this->setGroupId($groupId)
            ->setMemberAccount($memberAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/modify_group_member_info';
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
     * @param string $memberAccount
     *
     * @return $this
     */
    public function setMemberAccount(string $memberAccount)
    {
        $this->setParameter('Member_Account', $memberAccount);

        return $this;
    }

    /**
     * @param string $role
     *
     * @return $this
     */
    public function setRole(string $role)
    {
        $this->setParameter('Role', $role);

        return $this;
    }

    /**
     * @param string $msgFlag
     *
     * @return $this
     */
    public function setMsgFlag(string $msgFlag)
    {
        $this->setParameter('MsgFlag', $msgFlag);

        return $this;
    }

    /**
     * @param string $nameCard
     *
     * @return $this
     */
    public function setNameCard(string $nameCard)
    {
        $this->setParameter('NameCard', $nameCard);

        return $this;
    }

    /**
     * @param array $appMemberDefinedData
     *
     * @return $this
     */
    public function setAppMemberDefinedData(array $appMemberDefinedData)
    {
        $this->setParameter('AppMemberDefinedData', $appMemberDefinedData);

        return $this;
    }

    /**
     * @param int $shutUpTime
     *
     * @return $this
     */
    public function setShutUpTime(int $shutUpTime)
    {
        $this->setParameter('ShutUpTime', $shutUpTime);

        return $this;
    }
}
