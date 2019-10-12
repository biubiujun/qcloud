<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgBody;

/**
 * Class SendGroupMsgRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class SendGroupMsgRequest extends BaseRequest
{
    /**
     * SendGroupMsgRequest constructor.
     *
     * @param string                                                   $groupId
     * @param \BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgBody $msgBody
     * @param string                                                   $fromAccount
     */
    public function __construct(string $groupId, MsgBody $msgBody, string $fromAccount = '')
    {
        $this->setGroupId($groupId)
            ->setMsgBody($msgBody)
            ->setFromAccount($fromAccount);

        $this->setParameter('MsgRandom', random_int(100000, 9999999));
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/send_group_msg';
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
     * @param string $msgPriority
     *
     * @return $this
     */
    public function setMsgPriority(string $msgPriority)
    {
        $this->setParameter('MsgPriority', $msgPriority);

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
     * @param array $offlinePushInfo
     *
     * @return $this
     */
    public function setOfflinePushInfo(array $offlinePushInfo)
    {
        $this->setParameter('OfflinePushInfo', $offlinePushInfo);

        return $this;
    }

    /**
     * @param array $forbidCallbackControl
     *
     * @return $this
     */
    public function setForbidCallbackControl(array $forbidCallbackControl)
    {
        $this->setParameter('ForbidCallbackControl', $forbidCallbackControl);

        return $this;
    }

    /**
     * @param int $onlineOnlyFlag
     *
     * @return $this
     */
    public function setOnlineOnlyFlag(int $onlineOnlyFlag)
    {
        $this->setParameter('OnlineOnlyFlag', $onlineOnlyFlag);

        return $this;
    }
}
