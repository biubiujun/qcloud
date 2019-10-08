<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ForbidSendMsgRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class ForbidSendMsgRequest extends BaseRequest
{
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/forbid_send_msg';
    }

    public function setGroupId(string $groupId)
    {
        $this->setParameter('GroupId', $groupId);

        return $this;
    }
}
