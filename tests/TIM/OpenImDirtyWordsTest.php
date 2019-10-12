<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Requests\OpenImDirtyWord\AddRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenImDirtyWord\DeleteRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenImDirtyWord\GetRequest;
use BiuBiuJun\Tests\TestCase;

class OpenImDirtyWordsTest extends TestCase
{
    public function testGet()
    {
        $request = new GetRequest();
        /** @var \BiuBiuJun\QCloud\TIM\Responses\OpenImDirtyWord\GetResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getDirtyWordsList());

        $this->assertTrue($response->isSuccessful());
    }

    public function testAdd()
    {
        $request = new AddRequest([
            '你',
            '我',
            '他',
        ]);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testDelete()
    {
        $request = new DeleteRequest([
            '你',
            '我',
            '他',
        ]);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }
}
