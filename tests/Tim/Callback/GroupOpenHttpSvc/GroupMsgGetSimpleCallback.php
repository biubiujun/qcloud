<?php

namespace BiuBiuJun\QCloud\Tim\Callback\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\Contracts\CallbackInterface;

/**
 * Class GroupMsgGetSimpleCallback
 *
 * @package BiuBiuJun\QCloud\TimClient\Callback\GroupOpenHttpSvc
 */
class GroupMsgGetSimpleCallback implements CallbackInterface
{
    /**
     * @var array
     */
    private $messages;

    /**
     * @var array
     */
    private $fromAccounts;

    /**
     * @var array
     */
    private $defaultFromAccount = [];

    /**
     * @param \BiuBiuJun\QCloud\Tim\Responses\GroupOpenHttpSvc\GroupMsgGetSimpleResponse $response
     *
     * @return array
     */
    public function success($response)
    {
        $rspMsgList = $response->getRspMsgList();
        foreach ($rspMsgList as $item) {
            if ('@TimClient#SYSTEM' == $item['From_Account']
                || !isset($item['MsgBody'][0]['MsgType'])
                || 'TIMCustomElem' == $item['MsgBody'][0]['MsgType']) {
                continue;
            }

            $this->messages[] = [
//                'from_account' => $this->getFromAccount($item['From_Account']),
                'body' => $this->formatMsgBody($item['MsgBody']),
                'rabdin' => $item['MsgRandom'],
                'seq' => $item['MsgSeq'],
                'timestamp' => $item['MsgTimeStamp'],
            ];
        }

        return $rspMsgList[array_key_last($rspMsgList)]['MsgSeq'];
    }

    /**
     * @param $reason
     */
    public function error($reason)
    {
        // TODO: Implement error() method.
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $fromAccounts
     *
     * @return $this
     */
    public function setFromAccounts(array $fromAccounts)
    {
        $this->fromAccounts = $fromAccounts;

        return $this;
    }

    /**
     * @param array $default
     *
     * @return $this
     */
    public function setDefaultFromAccount(array $default)
    {
        $this->defaultFromAccount = $default;

        return $this;
    }

    /**
     * @param string $fromAccount
     *
     * @return array
     */
    protected function getFromAccount(string $fromAccount)
    {
        return $this->fromAccounts[$fromAccount] ?? $this->defaultFromAccount;
    }

    /**
     * @param array $msgBody
     *
     * @return array
     */
    public function formatMsgBody(array $msgBody)
    {
        foreach ($msgBody as $item) {
            print_r($item);exit;
        }

        return $msgBody;
    }
}
