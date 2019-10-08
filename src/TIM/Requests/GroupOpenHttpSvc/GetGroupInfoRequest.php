<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetGroupInfo
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class GetGroupInfoRequest extends BaseRequest
{
    /**
     * GetGroupInfo constructor.
     *
     * @param string|array $groupList
     */
    public function __construct($groupList)
    {
        $this->setGroupList($groupList);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/get_group_info';
    }

    /**
     * @param string|array $groupList
     *
     * @return $this
     */
    public function setGroupList($groupList)
    {
        $this->setParameter('GroupList', is_array($groupList) ? $groupList : [$groupList]);

        return $this;
    }

    /**
     * @param array $groupBaseInfoFilter
     *
     * @return $this
     */
    public function setGroupBaseInfoFilter(array $groupBaseInfoFilter)
    {
        $this->setParameter('GroupBaseInfoFilter', $groupBaseInfoFilter);

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
     * @param array $appDefinedDataFilterGroup
     *
     * @return $this
     */
    public function setAppDefinedDataFilterGroup(array $appDefinedDataFilterGroup)
    {
        $this->setParameter('AppDefinedDataFilter_Group', $appDefinedDataFilterGroup);

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
}
