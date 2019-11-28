<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class SendGroupSystemNotificationRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\GroupOpenHttpSvc
 */
class SendGroupSystemNotificationRequest extends BaseRequest
{
    /**
     * SendGroupSystemNotificationRequest constructor.
     *
     * @param string $groupId
     * @param string $content
     */
    public function __construct(string $groupId, string $content)
    {
        $this->setGroupId($groupId)
            ->setContent($content);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/send_group_system_notification';
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
     * @param array $toMembersAccount
     *
     * @return $this
     */
    public function setToMembersAccount(array $toMembersAccount)
    {
        $this->setParameter('ToMembers_Account', $toMembersAccount);

        return $this;
    }

    /**
     * @param string $content
     *
     * @return $this
     */
    public function setContent(string $content)
    {
        $this->setParameter('Content', $content);

        return $this;
    }
}
