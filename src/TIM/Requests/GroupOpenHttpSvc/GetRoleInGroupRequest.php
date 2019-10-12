<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetRoleInGroupRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class GetRoleInGroupRequest extends BaseRequest
{
    /**
     * GetRoleInGroupRequest constructor.
     *
     * @param string       $groupId
     * @param string|array $userAccount
     */
    public function __construct(string $groupId, $userAccount)
    {
        $this->setGroupId($groupId)
            ->setUserAccount($userAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/get_role_in_group';
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
     * @param string|array $userAccount
     *
     * @return $this
     */
    public function setUserAccount($userAccount)
    {
        $this->setParameter('User_Account', is_array($userAccount) ? $userAccount : [$userAccount]);

        return $this;
    }
}
