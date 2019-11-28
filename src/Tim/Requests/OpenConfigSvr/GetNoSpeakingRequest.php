<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenConfigSvr;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetNoSpeakingRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\OpenConfigSvr
 */
class GetNoSpeakingRequest extends BaseRequest
{
    /**
     * GetNoSpeakingRequest constructor.
     *
     * @param string $getAccount
     */
    public function __construct(string $getAccount)
    {
        $this->setGetAccount($getAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/openconfigsvr/getnospeaking';
    }

    /**
     * @param string $getAccount
     *
     * @return $this
     */
    public function setGetAccount(string $getAccount)
    {
        $this->setParameter('Get_Account', $getAccount);

        return $this;
    }
}
