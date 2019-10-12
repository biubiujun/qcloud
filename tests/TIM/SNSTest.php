<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Constants\Portrait;
use BiuBiuJun\QCloud\TIM\Constants\SnsIm;
use BiuBiuJun\QCloud\TIM\Requests\Sns\BlackListAddRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\BlackListCheckRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\BlackListDeleteRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\BlackListGetRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendAddRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendCheckRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendDeleteAllRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendDeleteRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendGetListRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendGetRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendImportRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\FriendUpdateRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\GroupAddRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\GroupDeleteRequest;
use BiuBiuJun\QCloud\TIM\Requests\Sns\Parameters\FriendCustomItem;
use BiuBiuJun\QCloud\TIM\Requests\Sns\Parameters\FriendItem;
use BiuBiuJun\Tests\TestCase;

class SNSTest extends TestCase
{
    public function testFriendAdd()
    {
        $friendItem = new FriendItem('ak47-001', 'AddSource_Type_System');
        $friendItem->setRemark('remark');
        $friendItem->setGroupName(['group_name']);
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
        $friendItem->setGroupName(['group_name']);
        $friendItem->setAddWording('add_wording');
        $friendItem->setAddTime(time());
//        $customItem = new FriendCustomItem();
//        $customItem->setCustomTag('Tag_SNS_Custom_a', 'test');
//        $customItem->setCustomTag('Tag_SNS_Custom_b', 'test2');
//        $friendItem->setCustomItem($customItem);

        $request = new FriendImportRequest('ak47', $friendItem);
//        $request = new FriendImportRequest('ak47', [
//            $friendItem,
//            $friendItem2,
//        ]);
//        var_dump(json_encode($request->getParameters()));
//        exit;
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\FriendImportResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getResultItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendUpdate()
    {
        $friendItem = new FriendItem('ak47-002');
        $friendCustomItem = new FriendCustomItem();
        $friendCustomItem->setIMTag('Remark', 'remark22222');
        $friendCustomItem->setIMTag('Group', ['group2222']);
        $friendItem->setSnsItem($friendCustomItem);

        $request = new FriendUpdateRequest('ak47', $friendItem);
//        $request = new FriendUpdateRequest('ak47', [
//            $friendItem,
//            $friendItem2,
//        ]);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\FriendUpdateResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getResultItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendDelete()
    {
        $request = new FriendDeleteRequest('ak47', 'ak47-002', SnsIm::DELETE_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\FriendDeleteResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        var_dump($response->getResultItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendDeleteAll()
    {
        $request = new FriendDeleteAllRequest('ak47', SnsIm::DELETE_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\FriendDeleteAllResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendCheck()
    {
        $request = new FriendCheckRequest('ak47', 'ak47-001', SnsIm::CHECK_RESULT_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\FriendCheckResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getFailAccount());
//        var_dump($response->getInfoItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendGet()
    {
        $request = new FriendGetRequest('ak47');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\FriendGetResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getUserDataItem());
//        var_dump($response->getStandardSequence());
//        var_dump($response->getCustomSequence());
//        var_dump($response->getFriendNum());
//        var_dump($response->getCompleteFlag());
//        var_dump($response->getNextStartIndex());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendGetList()
    {
        $request = new FriendGetListRequest(
            'ak47',
            'ak47-001',// ['ak47-001']
            [
                Portrait::TAG_NICK,
                SnsIm::TAG_ADD_SOURCE,
            ]);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\FriendGetListResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getInfoItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListAdd()
    {
        $request = new BlackListAddRequest('ak47', 'ak47-001');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\BlackListAddResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getInfoItem());
//        var_dump($response->getFailAccount());
//        var_dump($response->getInvalidAccount());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListDelete()
    {
        $request = new BlackListDeleteRequest('ak47', 'ak47-001');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\BlackListDeleteResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getResultItem());
//        var_dump($response->getFailAccount());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListGet()
    {
        $request = new BlackListGetRequest('ak47');
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\BlackListGetResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getBlackListItem());
//        var_dump($response->getStartIndex());
//        var_dump($response->getCurruentSequence());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListCheck()
    {
        $request = new BlackListCheckRequest('ak47', 'ak47-001', SnsIm::BLACK_CHECK_RESULT_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\BlackListCheckResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getBlackListCheckItem());
//        var_dump($response->getFailAccount());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGroupAdd()
    {
        $request = new GroupAddRequest('ak47', ['a', 'b']);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\GroupAddResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getResultItem());
//        var_dump($response->getFailAccount());
//        var_dump($response->getInvalidAccount());
//        var_dump($response->getCurrentSequence());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGroupDelete()
    {
        $request = new GroupDeleteRequest('ak47', ['a', 'b']);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Sns\GroupDeleteResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        var_dump($response->getCurrentSequence());

        $this->assertTrue($response->isSuccessful());
    }
}
