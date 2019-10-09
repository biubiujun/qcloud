<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Parameters\MsgBody;
use BiuBiuJun\QCloud\TIM\Parameters\MsgElements\Text;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\BatchSendMsgRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\ImportMsgRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\SendMsgRequest;
use BiuBiuJun\Tests\TestCase;

class OpenIMTest extends TestCase
{
    public function testSendMsg()
    {
        $msgBody = new MsgBody([
            new Text('test biubiubiu'),
        ]);
        $request = new SendMsgRequest($msgBody, 'ak47-002', 'ak47-001', 1);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testBatchSendMsg()
    {
        $msgBody = new MsgBody([
            new Text('test biubiubiu batch'),
        ]);
        $request = new BatchSendMsgRequest($msgBody, ['ak47-002', 'ak47-003'], 'ak47-001', 1);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testImportMsg()
    {
        $msgBody = new MsgBody([
            new Text('test biubiubiu import'),
        ]);
        $request = new ImportMsgRequest($msgBody, 'ak47-002', 'ak47-001', 1);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }
}
