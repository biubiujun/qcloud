<?php

namespace BiuBiuJun\Tests\Trtc;

use BiuBiuJun\QCloud\Trtc\Requests\DissolveRoomRequest;
use BiuBiuJun\QCloud\Trtc\Requests\KickOutUserRequest;
use BiuBiuJun\Tests\TestCase;

class TrtcTest extends TestCase
{
    public function testDissolveRoom()
    {
        $request = new DissolveRoomRequest(1400235705, 1984027965);
        $response = $this->getTrtcClient()->sendRequest($request);

        print_r($response);exit;
    }

    public function testKickOutUser()
    {
        $request = new KickOutUserRequest(1400235705, 1984027965, [
            '9df526cb647a40e6a8970850b02b2079'
        ]);
        $response = $this->getTrtcClient()->sendRequest($request);

        print_r($response);exit;
    }
}
