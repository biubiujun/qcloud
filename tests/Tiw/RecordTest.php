<?php

namespace BiuBiuJun\Tests\Tiw;

use BiuBiuJun\QCloud\Tiw\Requests\StartOnlineRecordRequest;
use BiuBiuJun\QCloud\Tiw\Requests\StopOnlineRecordRequest;
use BiuBiuJun\Tests\TestCase;

class RecordTest extends TestCase
{
    private $sdkAppId = 1400235705;

    public function testStartOnlineRecord()
    {
        $roomId = 1984027965;
        $userId = "tic_record_user_{$roomId}_02";
        $userSign = $this->getTiwClient()->genUserSign($userId);

        $request = new StartOnlineRecordRequest($this->sdkAppId, $roomId, $userId, $userSign);
        $response = $this->getTiwClient()->sendRequest($request);

        print_r($response->getContent());
    }

    public function testStopOnlineRecord()
    {
        $taskId = 'gdv0qot2jtgtv4cin0ob';

        $request = new StopOnlineRecordRequest($this->sdkAppId, $taskId);
        $response = $this->getTiwClient()->sendRequest($request);

        print_r($response->getContent());
    }
}
