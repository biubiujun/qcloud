<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\TIM\Parameters\MsgBody;

/**
 * Class ImportMsgRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\OpenIm
 */
class ImportMsgRequest extends BaseRequest
{
    /**
     * ImportMsgRequest constructor.
     *
     * @param \BiuBiuJun\QCloud\TIM\Parameters\MsgBody $msgBody
     * @param string                                   $toAccount
     * @param string                                   $fromAccount
     * @param int                                      $syncFromOldSystem
     */
    public function __construct(MsgBody $msgBody, string $toAccount, string $fromAccount = '', int $syncFromOldSystem = 2)
    {
        $this->setMsgBody($msgBody)
            ->setToAccount($toAccount)
            ->setFromAccount($fromAccount)
            ->setSyncFromOldSystem($syncFromOldSystem);

        $this->setParameter('MsgRandom', random_int(100000, 9999999));
        $this->setParameter('MsgTimeStamp', time());
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/openim/importmsg';
    }

    /**
     * @param int $syncFromOldSystem
     *
     * @return \BiuBiuJun\QCloud\TIM\Requests\ImportMsgRequest
     */
    public function setSyncFromOldSystem(int $syncFromOldSystem)
    {
        $this->setParameter('SyncFromOldSystem', $syncFromOldSystem);

        return $this;
    }

    /**
     * @param string $fromAccount
     *
     * @return \BiuBiuJun\QCloud\TIM\Requests\ImportMsgRequest
     */
    public function setFromAccount(string $fromAccount)
    {
        $this->setParameter('From_Account', $fromAccount);

        return $this;
    }

    /**
     * @param string $toAccount
     *
     * @return \BiuBiuJun\QCloud\TIM\Requests\ImportMsgRequest
     */
    public function setToAccount(string $toAccount)
    {
        $this->setParameter('To_Account', $toAccount);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\TIM\Parameters\MsgBody $parameter
     *
     * @return \BiuBiuJun\QCloud\TIM\Requests\ImportMsgRequest
     */
    public function setMsgBody(MsgBody $parameter)
    {
        $this->setParameter('MsgBody', $parameter->getParameters());

        return $this;
    }
}
