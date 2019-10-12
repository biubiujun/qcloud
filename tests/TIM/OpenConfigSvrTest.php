<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Requests\OpenConfigSvr\GetAppInfoRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenConfigSvr\GetNoSpeakingRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenConfigSvr\SetNoSpeakingRequest;
use BiuBiuJun\Tests\TestCase;

class OpenConfigSvrTest extends TestCase
{
    public function testSetNoSpeaking()
    {
        $request = new SetNoSpeakingRequest('ak47');
        $request->setC2CMsgNoSpeakingTime(100);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr\SetNoSpeakingResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetNoSpeaking()
    {
        $request = new GetNoSpeakingRequest('ak47');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr\GetNoSpeakingResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        var_dump($response->getC2CMsgNoSpeakingTime());
        var_dump($response->getGroupmsgNospeakingTime());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetAppInfo()
    {
        $request = new GetAppInfoRequest();
        /** @var \BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr\GetAppInfoResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        var_dump($response->getResult());

        $this->assertTrue($response->isSuccessful());
    }
}
