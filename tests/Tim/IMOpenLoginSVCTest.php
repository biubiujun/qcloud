<?php

namespace BiuBiuJun\Tests\Tim;

use BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\AccountDeleteRequest;
use BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\AccountImportRequest;
use BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\KickRequest;
use BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\MultiAccountImportRequest;
use BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\Parameters\AccountDeleteItem;
use BiuBiuJun\Tests\TestCase;

class IMOpenLoginSVCTest extends TestCase
{
    public function testAccountImport()
    {
        $request = new AccountImportRequest('ak47-biubiubiu', 'ak47');
        /** @var \BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc\AccountImportResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testMultiAccountImport()
    {
        $request = new MultiAccountImportRequest([
            'ak47-001',
            'ak47-002',
            'ak47-003',
        ]);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc\MultiAccountImportResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getFailAccounts());

        $this->assertTrue($response->isSuccessful());
    }

    public function testAccountDelete()
    {
        $accountDeleteItem = new AccountDeleteItem([
            'ak47-001',
            'ak47-002',
        ]);
        $request = new AccountDeleteRequest($accountDeleteItem);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc\AccountDeleteResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getResultItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testKick()
    {
        $request = new KickRequest('ak47-biubiubiu');
        /** @var \BiuBiuJun\QCloud\Tim\Responses\ImOpenLoginSvc\KickResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }
}
