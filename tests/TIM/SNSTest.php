<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Requests\Sns\BlackListGetRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendAddRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendImportRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendUpdateRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\Parameters\FriendCustomItem;
use BiuBiuJun\QCloud\TIM\Requests\Sns\Parameters\FriendItem;
use BiuBiuJun\Tests\TestCase;

class SNSTest extends TestCase
{
    public function testFriendAdd()
    {
        $friendItem = new FriendItem('ak47-001', 'AddSource_Type_System');
        $friendItem->setRemark('remark');
        $friendItem->setGroupName('group_name');
        $friendItem->setAddWording('add_wording');

        $request = new FriendAddRequest('ak47', $friendItem);
//        $request = new FriendAddRequest('ak47', [
//            $friendItem,
//            $friendItem2,
//        ]);

        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendImport()
    {
        $friendItem = new FriendItem('ak47-002', 'AddSource_Type_System');
        $friendItem->setRemark('remark');
        $friendItem->setRemarkTime(time());
        $friendItem->setGroupName('group_name');
        $friendItem->setAddWording('add_wording');
        $friendItem->setAddTime(time());
        $customItem = new FriendCustomItem();
        $customItem->setCustom('Tag_SNS_Custom_a', 'test');
        $customItem->setCustom('Tag_SNS_Custom_b', 'test2');
        $friendItem->setCustomItem($customItem);

        $request = new FriendImportRequest('ak47', [
            $friendItem,
//            $friendItem2,
        ]);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendUpdate()
    {
        $friendItem = new FriendItem('ak47-002');
        $friendCustomItem = new FriendCustomItem();
        $friendCustomItem->setIMTag('Remark', 'remark22222');
        $friendCustomItem->setIMTag('Group', 'group2222');
        $friendItem->setSnsItem($friendCustomItem);

        $request = new FriendUpdateRequest('ak47', [
            $friendItem,
        ]);
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListGet()
    {
        $request = new BlackListGetRequest('ak47');
        $response = $this->getTIMClient()->sendRequest($request);

        var_dump($response);
    }
}
