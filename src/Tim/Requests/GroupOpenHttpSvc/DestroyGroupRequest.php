<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class DestroyGroupRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\GroupOpenHttpSvc
 */
class DestroyGroupRequest extends BaseRequest
{
    /**
     * DestroyGroupRequest constructor.
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
        return 'v4/group_open_http_svc/destroy_group';
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
