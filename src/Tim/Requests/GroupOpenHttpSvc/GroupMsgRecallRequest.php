<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GroupMsgRecallRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\GroupOpenHttpSvc
 */
class GroupMsgRecallRequest extends BaseRequest
{
    /**
     * GroupMsgRecallRequest constructor.
     *
     * @param string    $groupId
     * @param int|array $msgSeqList
     */
    public function __construct(string $groupId, $msgSeqList)
    {
        $this->setGroupId($groupId)
            ->setMsgSeqList($msgSeqList);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/group_msg_recall';
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
     * @param int|array $msgSeqList
     *
     * @return $this
     */
    public function setMsgSeqList($msgSeqList)
    {
        $this->setParameter('MsgSeqList', is_array($msgSeqList) ? $msgSeqList : [$msgSeqList]);

        return $this;
    }
}
