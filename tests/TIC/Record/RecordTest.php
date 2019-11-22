<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIC\Requests\Record\OnlineQueryRequest;
use BiuBiuJun\QCloud\TIC\Requests\Record\OnlineStartRequest;
use BiuBiuJun\QCloud\TIC\Requests\Record\OnlineStopRequest;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\Concat;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStream;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStreamCustomLayout;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStreamCustomLayoutCanvas;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStreamCustomLayoutInputStreamListItem;
use BiuBiuJun\Tests\TestCase;

class RecordTest extends TestCase
{
    public function testOnlineStart()
    {
        $roomId = 1439117902;
        $userId = "tic_record_user_{$roomId}_01";
        $userSig = $this->getTICClient()->getUserSig($userId);
        $request = new OnlineStartRequest(1439117902, $userId, $userSig);

        $concat = new Concat(true);
        $request->setConcat($concat);

        $mixStream = new MixStream(true);
//        $mixStream->setModelId(2);
//        $mixStream->setTeacherId('ff570402f88748fcbe7eca303a1ca275');

        $canvas = new MixStreamCustomLayoutCanvas(1280, 960);
//        $canvas = new MixStreamCustomLayoutCanvas(1280, 960);

        $ticRecordUser = new MixStreamCustomLayoutInputStreamListItem(
            'tic_record_user',
            1280,
            960,
            0,
            0,
            2
        );
        $ticSubstream = new MixStreamCustomLayoutInputStreamListItem(
            'tic_substream',
            100,
            100,
            0,
            0,
            1
        );
        $desktop = new MixStreamCustomLayoutInputStreamListItem(
            "tic_record_user_{$roomId}_02",
            100,
            100,
            0,
            0,
            1
        );
        $empty = new MixStreamCustomLayoutInputStreamListItem(
            '',
            100,
            100,
            0,
            0,
            1
        );
        $inputStreamList = [
            $ticRecordUser->getParameters(),
            $ticSubstream->getParameters(),
            $desktop->getParameters(false),
            $empty->getParameters(false),
        ];

        $custom = new MixStreamCustomLayout($canvas, $inputStreamList);
        $mixStream->setCustom($custom);
        $request->setMixStream($mixStream);

        $request->setExtra(['mix_stream']);

        $response = $this->getTICClient()->sendRequest($request);
        print_r($response);
        exit;
        $this->assertTrue($response->isSuccessful());
    }

    public function testOnlineStop()
    {
        $taskId = 'grr52ss6stgtvsc4rbnb';
        $request = new OnlineStopRequest($taskId);
        $response = $this->getTICClient()->sendRequest($request);
        print_r($response);
        exit;
        $this->assertTrue($response->isSuccessful());
    }

    public function testOnlineQuery()
    {
        $taskId = 'grr52ss6stgtvsc4rbnb';
        $request = new OnlineQueryRequest($taskId);
        $response = $this->getTICClient()->sendRequest($request);
        print_r($response);
        exit;
        $this->assertTrue($response->isSuccessful());
    }
}
