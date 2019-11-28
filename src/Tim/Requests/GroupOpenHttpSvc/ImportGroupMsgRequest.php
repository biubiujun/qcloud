<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ImportGroupMsgRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\GroupOpenHttpSvc
 */
class ImportGroupMsgRequest extends BaseRequest
{
    /**
     * ImportGroupMsgRequest constructor.
     *
     * @param string $groupId
     * @param string $msgList
     */
    public function __construct(string $groupId, string $msgList)
    {
        $this->setGroupId($groupId)
            ->setMsgList($msgList);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/import_group_msg';
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
     * @param string $msgList
     *
     * @return $this
     */
    public function setMsgList(string $msgList)
    {
        $this->setParameter('MsgList', $msgList);

        return $this;
    }
}
