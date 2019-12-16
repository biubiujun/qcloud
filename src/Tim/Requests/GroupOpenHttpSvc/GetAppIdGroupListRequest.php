<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetAppIdGroupListRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc
 */
class GetAppIdGroupListRequest extends BaseRequest
{
    /**
     * GetAppIdGroupListRequest constructor.
     *
     * @param int    $limit
     * @param int    $next
     * @param string $groupType
     */
    public function __construct(int $limit = 20, int $next = 0, string $groupType = '')
    {
        $this->setLimit($limit)
            ->setNext($next)
            ->setGroupType($groupType);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/get_appid_group_list';
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
     * @param int $next
     *
     * @return $this
     */
    public function setNext(int $next)
    {
        $this->setParameter('Next', $next);

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
}
