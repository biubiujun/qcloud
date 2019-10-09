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
     */
    public function __construct(string $groupId, array $memberList)
    {
        $this->setGroupId($groupId)
            ->setMemberList($memberList);
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
        $memberListArray = [];
        foreach ($memberList as $item) {
            $memberListArray['Member_Account'] = $item;
        }

        $this->setParameter('MemberList', $memberListArray);

        return $this;
    }
}
