<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class AddGroupMemberRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class AddGroupMemberRequest extends BaseRequest
{
    /**
     * AddGroupMemberRequest constructor.
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
        return 'v4/group_open_http_svc/add_group_member';
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
     * @param int $silence
     *
     * @return $this
     */
    public function setSilence(int $silence)
    {
        $this->setParameter('Silence', $silence);

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
}
