<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ImportGroupMemberRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class ImportGroupMemberRequest extends BaseRequest
{
    /**
     * ImportGroupMemberRequest constructor.
     *
     * @param string $groupId
     * @param array  $memberList
     * @param string $memberAccount
     */
    public function __construct(string $groupId, array $memberList, string $memberAccount)
    {
        $this->setGroupId($groupId)
            ->setMemberList($memberList)
            ->setMemberAccount($memberAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/import_group_member';
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
     * @param array $memberList
     *
     * @return $this
     */
    public function setMemberList(array $memberList)
    {
        $this->setParameter('MemberList', $memberList);

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
     * @param int $joinTime
     *
     * @return $this
     */
    public function setJoinTime(int $joinTime)
    {
        $this->setParameter('JoinTime', $joinTime);

        return $this;
    }

    /**
     * @param int $unreadMsgNum
     *
     * @return $this
     */
    public function setUnreadMsgNum(int $unreadMsgNum)
    {
        $this->setParameter('UnreadMsgNUm', $unreadMsgNum);

        return $this;
    }
}
