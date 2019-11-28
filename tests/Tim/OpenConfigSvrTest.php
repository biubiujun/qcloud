<?php

namespace BiuBiuJun\Tests\Tim;

use BiuBiuJun\QCloud\Tim\Requests\OpenConfigSvr\GetAppInfoRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenConfigSvr\GetNoSpeakingRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenConfigSvr\SetNoSpeakingRequest;
use BiuBiuJun\Tests\TestCase;

class OpenConfigSvrTest extends TestCase
{
    public function testSetNoSpeaking()
    {
        $request = new SetNoSpeakingRequest('ak47');
        $request->setC2CMsgNoSpeakingTime(100);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr\SetNoSpeakingResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetNoSpeaking()
    {
        $request = new GetNoSpeakingRequest('ak47');
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr\GetNoSpeakingResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        var_dump($response->getC2CMsgNoSpeakingTime());
        var_dump($response->getGroupmsgNospeakingTime());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetAppInfo()
    {
        $request = new GetAppInfoRequest();
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenConfigSvr\GetAppInfoResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        var_dump($response->getResult());

        $this->assertTrue($response->isSuccessful());
    }
}
