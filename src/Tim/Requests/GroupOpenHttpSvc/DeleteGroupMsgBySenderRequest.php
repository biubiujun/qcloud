<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class DeleteGroupMsgBySenderRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc
 */
class DeleteGroupMsgBySenderRequest extends BaseRequest
{
    /**
     * DeleteGroupMsgBySenderRequest constructor.
     *
     * @param string $groupId
     * @param string $senderAccount
     */
    public function __construct(string $groupId, string $senderAccount)
    {
        $this->setGroupId($groupId)
            ->setSenderAccount($senderAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/delete_group_msg_by_sender';
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
     * @param string $senderAccount
     *
     * @return $this
     */
    public function setSenderAccount(string $senderAccount)
    {
        $this->setParameter('Sender_Account', $senderAccount);

        return $this;
    }
}
