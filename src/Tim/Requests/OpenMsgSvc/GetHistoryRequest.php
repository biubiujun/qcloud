<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenMsgSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetHistoryRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenMsgSvc
 */
class GetHistoryRequest extends BaseRequest
{
    /**
     * GetHistoryRequest constructor.
     *
     * @param string $chatType
     * @param string $msgTime
     */
    public function __construct(string $chatType, string $msgTime)
    {
        $this->setChatType($chatType)
            ->setMsgTime($msgTime);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/open_msg_svc/get_history';
    }

    /**
     * @param string $chatType
     *
     * @return $this
     */
    public function setChatType(string $chatType)
    {
        $this->setParameter('ChatType', $chatType);

        return $this;
    }

    /**
     * @param string $msgTime
     *
     * @return $this
     */
    public function setMsgTime(string $msgTime)
    {
        $this->setParameter('MsgTime', $msgTime);

        return $this;
    }
}
