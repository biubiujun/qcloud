<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgBody;

/**
 * Class BatchSendMsgRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\OpenIm
 */
class BatchSendMsgRequest extends BaseRequest
{
    /**
     * BatchSendMsgRequest constructor.
     *
     * @param \BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgBody $msgBody
     * @param string|array                                             $toAccount
     * @param string                                                   $fromAccount
     * @param int                                                      $syncOtherMachine
     * @param int                                                      $msgLifeTime
     */
    public function __construct(MsgBody $msgBody, $toAccount, string $fromAccount, int $syncOtherMachine = 2, int $msgLifeTime = 604800)
    {
        $this->setMsgBody($msgBody)
            ->setToAccount($toAccount)
            ->setFromAccount($fromAccount)
            ->setSyncOtherMachine($syncOtherMachine)
            ->setMsgLifeTime($msgLifeTime);

        $this->setParameter('MsgRandom', random_int(100000, 9999999));
        $this->setParameter('MsgTimeStamp', time());
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/openim/batchsendmsg';
    }

    /**
     * @param int $syncOtherMachine
     *
     * @return $this
     */
    public function setSyncOtherMachine(int $syncOtherMachine)
    {
        $this->setParameter('SyncOtherMachine', $syncOtherMachine);

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
     * @param string|array $toAccount
     *
     * @return $this
     */
    public function setToAccount($toAccount)
    {
        $this->setParameter('To_Account', is_array($toAccount) ? $toAccount : [$toAccount]);

        return $this;
    }

    /**
     * @param int $msgLifeTime
     *
     * @return $this
     */
    public function setMsgLifeTime(int $msgLifeTime)
    {
        $this->setParameter('MsgLifeTime', $msgLifeTime);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgBody $msgBody
     *
     * @return $this
     */
    public function setMsgBody(MsgBody $msgBody)
    {
        $this->setParameter('MsgBody', $msgBody->getParameters());

        return $this;
    }
}
