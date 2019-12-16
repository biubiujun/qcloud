<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetJoinedGroupListRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc
 */
class GetJoinedGroupListRequest extends BaseRequest
{
    /**
     * GetJoinedGroupListRequest constructor.
     *
     * @param string $memberAccount
     */
    public function __construct(string $memberAccount)
    {
        $this->setMemberAccount($memberAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/get_joined_group_list';
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

    /**
     * @param string $groupType
     *
     * @return $this
     */
    public function setGroupType(string $groupType)
    {
        $this->setParameter('GroupType', $groupType);

        return $this;
    }

    /**
     * @param array $responseFilter
     *
     * @return $this
     */
    public function setResponseFilter(array $responseFilter)
    {
        $this->setParameter('ResponseFilter', $responseFilter);

        return $this;
    }
}
