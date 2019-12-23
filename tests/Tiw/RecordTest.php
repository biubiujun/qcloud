<?php

namespace BiuBiuJun\Tests\Tiw;

use BiuBiuJun\QCloud\Tiw\Requests\StartOnlineRecordRequest;
use BiuBiuJun\Tests\TestCase;

class RecordTest extends TestCase
{
    public function testStartOnlineRecord()
    {
        $roomId = '1984027965';
        $userId = "tic_record_user_{$roomId}_02";
        $userSign = $this->tiwClient->genUserSign($userId);

        $request = new StartOnlineRecordRequest($roomId, $userId, $userSign);
        $response = $this->tiwClient->sendRequest($request);

        echo $response->getContent();
    }
}
