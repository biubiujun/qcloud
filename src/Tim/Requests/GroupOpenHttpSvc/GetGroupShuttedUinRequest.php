<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetGroupShuttedUinRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\GroupOpenHttpSvc
 */
class GetGroupShuttedUinRequest extends BaseRequest
{
    /**
     * GetGroupShuttedUinRequest constructor.
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
        return 'v4/group_open_http_svc/get_group_shutted_uin';
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
}
