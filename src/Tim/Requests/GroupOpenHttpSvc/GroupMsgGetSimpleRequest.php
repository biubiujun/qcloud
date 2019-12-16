<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GroupMsgGetSimpleRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc
 */
class GroupMsgGetSimpleRequest extends BaseRequest
{
    /**
     * GroupMsgGetSimpleRequest constructor.
     *
     * @param string $groupId
     * @param int    $reqMsgNumber
     */
    public function __construct(string $groupId, int $reqMsgNumber)
    {
        $this->setGroupId($groupId)
            ->setReqMsgNumber($reqMsgNumber);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/group_msg_get_simple';
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
     * @param int $reqMsgNumber
     *
     * @return $this
     */
    public function setReqMsgNumber(int $reqMsgNumber)
    {
        $this->setParameter('ReqMsgNumber', $reqMsgNumber);

        return $this;
    }

    /**
     * @param int $reqMsgSeq
     *
     * @return $this
     */
    public function setReqMsgSeq(int $reqMsgSeq)
    {
        $this->setParameter('ReqMsgSeq', $reqMsgSeq);

        return $this;
    }
}
