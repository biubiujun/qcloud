<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ForbidSendMsgRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\GroupOpenHttpSvc
 */
class ForbidSendMsgRequest extends BaseRequest
{
    /**
     * ForbidSendMsgRequest constructor.
     *
     * @param string       $groupId
     * @param string|array $membersAccount
     * @param int          $shutUpTime
     */
    public function __construct(string $groupId, $membersAccount, int $shutUpTime)
    {
        $this->setGroupId($groupId)
            ->setMembersAccount($membersAccount)
            ->setShutUpTime($shutUpTime);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/forbid_send_msg';
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
     * @param string|array $membersAccount
     *
     * @return $this
     */
    public function setMembersAccount($membersAccount)
    {
        $this->setParameter('Members_Account', is_array($membersAccount) ? $membersAccount : [$membersAccount]);

        return $this;
    }

    /**
     * @param int $shutUpTime
     *
     * @return $this
     */
    public function setShutUpTime(int $shutUpTime)
    {
        $this->setParameter('ShutUpTime', $shutUpTime);

        return $this;
    }
}
