<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Requests\OpenConfigSvr\SetNoSpeakingRequest;
use BiuBiuJun\Tests\TestCase;

class OpenConfigSvrTest extends TestCase
{
    public function testSetNoSpeaking()
    {
        $request = new SetNoSpeakingRequest('ak47');
        $request->setC2CMsgNoSpeakingTime(100);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }
}
