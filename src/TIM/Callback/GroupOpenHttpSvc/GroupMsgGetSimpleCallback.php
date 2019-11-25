<?php

namespace BiuBiuJun\QCloud\TIM\Callback\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\Contracts\CallbackInterface;

class GroupMsgGetSimpleCallback implements CallbackInterface
{
    private $messages;

    /**
     * @param \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GroupMsgGetSimpleResponse $response
     *
     * @return array
     */
    public function success($response)
    {
        $rspMsgList = $response->getRspMsgList();
        foreach ($rspMsgList as $item) {
            if ('@TIM#SYSTEM' == $item['From_Account']
                || !isset($item['MsgBody'][0]['MsgType'])
                || 'TIMCustomElem' == $item['MsgBody'][0]['MsgType']) {
                continue;
            }

            $this->messages[] = [
                'From_Account' => $item['From_Account'],
                'MsgBody' => $item['MsgBody'],
                'MsgRandom' => $item['MsgRandom'],
                'MsgSeq' => $item['MsgSeq'],
                'MsgTimeStamp' => $item['MsgTimeStamp'],
            ];
        }

        return $rspMsgList[array_key_last($rspMsgList)]['MsgSeq'];
    }

    public function error($reason)
    {
        // TODO: Implement error() method.
    }

    public function getMessages()
    {
        return $this->messages;
    }
}
