<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenConfigSvr;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class SetNoSpeakingRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\OpenConfigSvr
 */
class SetNoSpeakingRequest extends BaseRequest
{
    /**
     * SetNoSpeakingRequest constructor.
     *
     * @param string $setAccount
     */
    public function __construct(string $setAccount)
    {
        $this->setSetAccount($setAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/openconfigsvr/setnospeaking';
    }

    /**
     * @param string $setAccount
     *
     * @return $this
     */
    public function setSetAccount(string $setAccount)
    {
        $this->setParameter('Set_Account', $setAccount);

        return $this;
    }

    /**
     * @param int $C2CMsgNoSpeakingTime
     *
     * @return $this
     */
    public function setC2CMsgNoSpeakingTime(int $C2CMsgNoSpeakingTime)
    {
        $this->setParameter('C2CmsgNospeakingTime', $C2CMsgNoSpeakingTime);

        return $this;
    }

    /**
     * @param int $groupMsgNoSpeakingTime
     *
     * @return $this
     */
    public function setGroupMsgNoSpeakingTime(int $groupMsgNoSpeakingTime)
    {
        $this->setParameter('GroupmsgNospeakingTime', $groupMsgNoSpeakingTime);

        return $this;
    }
}
