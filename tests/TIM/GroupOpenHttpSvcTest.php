<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Callback\GroupOpenHttpSvc\GroupMsgGetSimpleCallback;
use BiuBiuJun\QCloud\TIM\Constants\Group;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\AddGroupMemberRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\ChangeGroupOwnerRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\CreateGroupRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\DeleteGroupMemberRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\DestroyGroupRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\ForbidSendMsgRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GetAppIdGroupListRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GetGroupInfoRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GetGroupMemberInfoRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GetGroupShuttedUinRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GetJoinedGroupListRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GetRoleInGroupRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GroupMsgGetSimpleRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\GroupMsgRecallRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\ImportGroupRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\ModifyGroupBaseInfoRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\ModifyGroupMemberInfoRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\Parameters\MemberItem;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\SendGroupMsgRequest;
use BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\SendGroupSystemNotificationRequest;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgBody;
use BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements\Text;
use BiuBiuJun\Tests\TestCase;
use GuzzleHttp\Pool;
use Psr\Http\Message\ResponseInterface;
use function GuzzleHttp\Promise\settle;

class GroupOpenHttpSvcTest extends TestCase
{
    public function testGetAppIdGroupList()
    {
        $request = new GetAppIdGroupListRequest();
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GetAppIdGroupListResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getGroupIdList());
//        var_dump($response->getNext());
//        var_dump($response->getTotalCount());

        $this->assertTrue($response->isSuccessful());
    }

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

    public function testGetGroupInfo()
    {
        $request = new GetGroupInfoRequest([
            'GROUP_ID_1',
            'GROUP_ID_2',
        ]);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GetGroupInfoResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getGroupInfo());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetGroupMemberInfo()
    {
        $request = new GetGroupMemberInfoRequest('GROUP_ID_1');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GetGroupMemberInfoResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getMemberList());
//        var_dump($response->getMemberList());

        $this->assertTrue($response->isSuccessful());
    }

    public function testModifyGroupBaseInfo()
    {
        $request = new ModifyGroupBaseInfoRequest('GROUP_ID_1');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\ModifyGroupBaseInfoResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testAddGroupMember()
    {
        $request = new AddGroupMemberRequest('GROUP_ID_1', [
            'ak47',
            'ak47-001',
        ]);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\AddGroupMemberResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteGroupMember()
    {
        $request = new DeleteGroupMemberRequest('GROUP_ID_1', 'ak47');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\DeleteGroupMemberResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testModifyGroupMemberInfo()
    {
        $request = new ModifyGroupMemberInfoRequest('GROUP_ID', 'ak47');
        $request->setRole(Group::ADMIN);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\ModifyGroupMemberInfoResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testDestroyGroup()
    {
        $request = new DestroyGroupRequest('GROUP_ID_1');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\DestroyGroupResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetJoinedGroupList()
    {
        $request = new GetJoinedGroupListRequest('ak47');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GetJoinedGroupListResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getGroupIdList());
//        var_dump($response->getTotalCount());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetRoleInGroup()
    {
        $request = new GetRoleInGroupRequest('GROUP_ID_1', 'ak47');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GetRoleInGroupResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getUserIdList());

        $this->assertTrue($response->isSuccessful());
    }

    public function testForbidSendMsg()
    {
        $request = new ForbidSendMsgRequest('GROUP_ID_1', 'ak47', 60);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\ForbidSendMsgResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testGetGroupShuttedUin()
    {
        $request = new GetGroupShuttedUinRequest('GROUP_ID_1');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GetGroupShuttedUinResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getGroupId());
//        var_dump($response->getShuttedUinList());

        $this->assertTrue($response->isSuccessful());
    }

    public function testSendGroupMsg()
    {
        $msgBody = new MsgBody([
            new Text('test biubiubiu'),
        ]);

        $request = new SendGroupMsgRequest('GROUP_ID_1', $msgBody, 'ak47');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\SendGroupMsgResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getMsgTime());
//        var_dump($response->getMsgSeq());

        $this->assertTrue($response->isSuccessful());
    }

    public function testSendGroupSystemNotification()
    {
        $request = new SendGroupSystemNotificationRequest('GROUP_ID_1', 'This is notification.');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\SendGroupSystemNotificationResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testGroupMsgRecall()
    {
        $request = new GroupMsgRecallRequest('GROUP_ID_1', 100);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\GroupMsgRecallResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getRecallRetList());

        $this->assertTrue($response->isSuccessful());
    }

    public function testChangeGroupOwner()
    {
        $request = new ChangeGroupOwnerRequest('GROUP_ID_1', 'ak47-001');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\ChangeGroupOwnerResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testImportGroup()
    {
        $request = new ImportGroupRequest(Group::GROUP_TYPE_PUBLIC, 'test');
        $request->setCreateTime(time());
        /** @var \BiuBiuJun\QCloud\TIM\Responses\GroupOpenHttpSvc\ImportGroupResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getGroupId());

        $this->assertTrue($response->isSuccessful());
    }

    public function testImportGroupMsg()
    {
    }

    public function testImportGroupMember()
    {
    }

    public function testSetUnreadMsgNum()
    {
    }

    public function testDeleteGroupMsgBySender()
    {
    }

    /**
     * @return mixed
     * @throws \BiuBiuJun\QCloud\Exceptions\BadRequestException
     * @throws \BiuBiuJun\QCloud\Exceptions\HttpException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function testGroupMsgGetSimple()
    {
        $groupId = 1984027965;
        $msgNumber = 20;

        // 获取第一组数据的最小seq
        $request = new GroupMsgGetSimpleRequest($groupId, $msgNumber);
        $response = $this->getTIMClient()->sendRequest($request);
        $callback = new GroupMsgGetSimpleCallback();

        if ($response->isSuccessful()) {
            $nextMsgSeq = $callback->success($response);

            $requests = function ($msgSeq) use ($request, $msgNumber) {
                $msgSeq -= $msgNumber;
                yield function () use ($request, $msgSeq) {
                    $request->setReqMsgSeq($msgSeq);

                    return $this->getTIMClient()->sendRequest($request, true);
                };
            };

            $pool = new Pool($this->getTIMClient()->getClient()->getHttpClient(), $requests($nextMsgSeq), [
                'concurrency' => 5,
                'fulfilled' => function ($resp, $index) use ($response, $callback) {
                    $response->handle($resp);
                    $callback->success($response);
                },
                'rejected' => function ($reason, $index) use ($response, $callback) {
                    $callback->error($reason);
                },
            ]);

            $promise = $pool->promise();
            $promise->wait();

            $messages = $callback->getMessages();
            var_dump($messages);

            $this->assertTrue(true);
        }
    }
}
