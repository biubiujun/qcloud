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
     * @param string|array $groupIdList
     */
    public function __construct($groupIdList)
    {
        $this->setGroupList($groupIdList);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/get_group_info';
    }

    /**
     * @param string|array $groupIdList
     *
     * @return $this
     */
    public function setGroupIdList($groupIdList)
    {
        $this->setParameter('GroupIdList', is_array($groupIdList) ? $groupIdList : [$groupIdList]);

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
