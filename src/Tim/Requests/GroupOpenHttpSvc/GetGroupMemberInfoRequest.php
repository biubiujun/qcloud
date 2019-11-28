<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetGroupMemberInfoRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\GroupOpenHttpSvc
 */
class GetGroupMemberInfoRequest extends BaseRequest
{
    /**
     * GetGroupMemberInfoRequest constructor.
     *
     * @param string $groupId
     */
    public function __construct(string $groupId)
    {
        $this->setGroupId($groupId);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/get_group_member_info';
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
     * @param array $memberInfoFilter
     *
     * @return $this
     */
    public function setMemberInfoFilter(array $memberInfoFilter)
    {
        $this->setParameter('MemberInfoFilter', $memberInfoFilter);

        return $this;
    }

    /**
     * @param array $memberRoleFilter
     *
     * @return $this
     */
    public function setMemberRoleFilter(array $memberRoleFilter)
    {
        $this->setParameter('MemberROleFilter', $memberRoleFilter);

        return $this;
    }

    /**
     * @param array $appDefinedDataFilterGroupMember
     *
     * @return $this
     */
    public function setAppDefinedDataFilterGroupMember(array $appDefinedDataFilterGroupMember)
    {
        $this->setParameter('AppDefinedDataFilter_GroupMember', $appDefinedDataFilterGroupMember);

        return $this;
    }

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function setLimit(int $limit)
    {
        $this->setParameter('Limit', $limit);

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function setOffset(int $offset)
    {
        $this->setParameter('Offset', $offset);

        return $this;
    }
}
