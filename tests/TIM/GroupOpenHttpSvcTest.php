<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Constants\Group;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\CreateGroupRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\Parameters\MemberItem;
use BiuBiuJun\Tests\TestCase;

class GroupOpenHttpSvcTest extends TestCase
{
    public function testCreateGroup()
    {
        $request = new CreateGroupRequest(Group::GROUP_TYPE_PUBLIC, 'This is a test room');

        // list
        $memberList = [];
        for ($i = 1; $i <= 3; $i++) {
            $memberItem = new MemberItem("ak47-00{$i}");
            $memberItem->setAppMemberDefinedData('Key1', 'Value1');
            $memberItem->setAppMemberDefinedData('Key2', 'Value2');
            $memberList[] = $memberItem;
        }
        $request->setMemberList($memberList);

        // item
        $memberItem = new MemberItem("ak47-007");
        $memberItem->setRole('Admin');
        $memberItem->setAppMemberDefinedData('Key1', 'Value1');
        $memberItem->setAppMemberDefinedData('Key2', 'Value2');
        $request->setMemberList($memberItem);

        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getGroupId());

        $this->assertTrue($response->isSuccessful());
    }
}
