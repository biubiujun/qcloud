<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgBody;

/**
 * Class importGroupMsgRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class importGroupMsgRequest extends BaseRequest
{
    /**
     * importGroupMsgRequest constructor.
     *
     * @param string                                                   $groupId
     * @param string                                                   $msgList
     * @param string                                                   $fromAccount
     * @param int                                                      $sendTime
     * @param \BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgBody $msgBody
     * @param string                                                   $msgType
     * @param array                                                    $msgContent
     */
    public function __construct(string $groupId, string $msgList, string $fromAccount, int $sendTime, MsgBody $msgBody, string $msgType, array $msgContent)
    {
        $this->setGroupId($groupId)
            ->setMsgList($msgList)
            ->setFromAccount($fromAccount)
            ->setSendTime($sendTime)
            ->setMsgBody($msgBody)
            ->setMsgType($msgType)
            ->setMsgContent($msgContent);
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

    /**
     * @param string $fromAccount
     *
     * @return $this
     */
    public function setFromAccount(string $fromAccount)
    {
        $this->setParameter('From_Account', $fromAccount);

        return $this;
    }

    /**
     * @param int $sendTime
     *
     * @return $this
     */
    public function setSendTime(int $sendTime)
    {
        $this->setParameter('SendTime', $sendTime);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgBody $msgBody
     *
     * @return $this
     */
    public function setMsgBody(MsgBody $msgBody)
    {
        $this->setParameter('MsgBody', $msgBody->getParameters());

        return $this;
    }

    /**
     * @param string $msgType
     *
     * @return $this
     */
    public function setMsgType(string $msgType)
    {
        $this->setParameter('MsgType', $msgType);

        return $this;
    }

    /**
     * @param array $msgContent
     *
     * @return $this
     */
    public function setMsgContent(array $msgContent)
    {
        $this->setParameter('MsgContent', $msgContent);

        return $this;
    }
}
