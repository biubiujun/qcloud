<?php

namespace BiuBiuJun\Tests\Tim;

use BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord\AddRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord\DeleteRequest;
use BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord\GetRequest;
use BiuBiuJun\Tests\TestCase;

class OpenImDirtyWordsTest extends TestCase
{
    public function testGet()
    {
        $request = new GetRequest();
        /** @var \BiuBiuJun\QCloud\Tim\Responses\OpenImDirtyWord\GetResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

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
        $response = $this->getTimClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testDelete()
    {
        $request = new DeleteRequest([
            '你',
            '我',
            '他',
        ]);
        $response = $this->getTimClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }
}
