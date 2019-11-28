<?php

namespace BiuBiuJun\Tests\Tim;

use BiuBiuJun\QCloud\Tim\Requests\OpenIm\BatchSendMsgRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenIm\ImportMsgRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgBody;
use BiuBiuJun\QCloud\Tim\Requests\OpenIm\Parameters\MsgElements\Text;
use BiuBiuJun\QCloud\Tim\Requests\OpenIm\QueryStateRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenIm\SendMsgRequest;
use BiuBiuJun\Tests\TestCase;

class OpenIMTest extends TestCase
{
    public function testSendMsg()
    {
        $msgBody = new MsgBody([
            new Text('test biubiubiu'),
        ]);
        $request = new SendMsgRequest($msgBody, 'ak47-002', 'ak47-001', 1);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenIm\SendMsgResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getMsgTime());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBatchSendMsg()
    {
        $msgBody = new MsgBody([
            new Text('test biubiubiu batch'),
        ]);
        $request = new BatchSendMsgRequest($msgBody, ['ak47-002', 'ak47-003'], 'ak47-001', 1);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenIm\BatchSendMsgResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getErrorList());

        $this->assertTrue($response->isSuccessful());
    }

    public function testImportMsg()
    {
        $msgBody = new MsgBody([
            new Text('test biubiubiu import'),
        ]);
        $request = new ImportMsgRequest($msgBody, 'ak47-002', 'ak47-001', 1);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenIm\ImportMsgResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testQueryState()
    {
        $request = new QueryStateRequest('ak47');
//        $request = new QueryStateRequest([
//            'ak47',
//            'ak47-001'
//        ]);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenIm\QueryStateResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getQueryResult());

        $this->assertTrue($response->isSuccessful());
    }
}
