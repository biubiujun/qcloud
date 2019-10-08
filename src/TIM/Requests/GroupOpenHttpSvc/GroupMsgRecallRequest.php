<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GroupMsgRecallRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class GroupMsgRecallRequest extends BaseRequest
{
    /**
     * GroupMsgRecallRequest constructor.
     *
     * @param string $groupId
     * @param array  $msgSeqList
     * @param int    $msgSeq
     */
    public function __construct(string $groupId, array $msgSeqList, int $msgSeq)
    {
        $this->setGroupId($groupId)
            ->setMsgSeqList($msgSeqList)
            ->setMsgSeq($msgSeq);
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
     * @param array $msgSeqList
     *
     * @return $this
     */
    public function setMsgSeqList(array $msgSeqList)
    {
        $this->setParameter('MsgSeqList', $msgSeqList);

        return $this;
    }

    /**
     * @param int $msgSeq
     *
     * @return $this
     */
    public function setMsgSeq(int $msgSeq)
    {
        $this->setParameter('MsgSeq', $msgSeq);

        return $this;
    }
}
