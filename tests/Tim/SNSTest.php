<?php

namespace BiuBiuJun\Tests\Tim;

use BiuBiuJun\QCloud\Tim\Constants\Portrait;
use BiuBiuJun\QCloud\Tim\Constants\SnsIm;
use BiuBiuJun\QCloud\Tim\Requests\Sns\BlackListAddRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\BlackListCheckRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\BlackListDeleteRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\BlackListGetRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendAddRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendCheckRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendDeleteAllRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendDeleteRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendGetListRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendGetRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendImportRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\FriendUpdateRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\GroupAddRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\GroupDeleteRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendCustomItem;
use BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendItem;
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

        $response = $this->getTimClient()->sendRequest($request);

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
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\FriendImportResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

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
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\FriendUpdateResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getResultItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendDelete()
    {
        $request = new FriendDeleteRequest('ak47', 'ak47-002', SnsIm::DELETE_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\FriendDeleteResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        var_dump($response->getResultItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendDeleteAll()
    {
        $request = new FriendDeleteAllRequest('ak47', SnsIm::DELETE_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\FriendDeleteAllResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendCheck()
    {
        $request = new FriendCheckRequest('ak47', 'ak47-001', SnsIm::CHECK_RESULT_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\FriendCheckResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getFailAccount());
//        var_dump($response->getInfoItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testFriendGet()
    {
        $request = new FriendGetRequest('ak47');
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\FriendGetResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

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
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\FriendGetListResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getInfoItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListAdd()
    {
        $request = new BlackListAddRequest('ak47', 'ak47-001');
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\BlackListAddResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getInfoItem());
//        var_dump($response->getFailAccount());
//        var_dump($response->getInvalidAccount());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListDelete()
    {
        $request = new BlackListDeleteRequest('ak47', 'ak47-001');
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\BlackListDeleteResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getResultItem());
//        var_dump($response->getFailAccount());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListGet()
    {
        $request = new BlackListGetRequest('ak47');
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\BlackListGetResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getBlackListItem());
//        var_dump($response->getStartIndex());
//        var_dump($response->getCurruentSequence());

        $this->assertTrue($response->isSuccessful());
    }

    public function testBlackListCheck()
    {
        $request = new BlackListCheckRequest('ak47', 'ak47-001', SnsIm::BLACK_CHECK_RESULT_TYPE_BOTH);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\BlackListCheckResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getBlackListCheckItem());
//        var_dump($response->getFailAccount());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGroupAdd()
    {
        $request = new GroupAddRequest('ak47', ['a', 'b']);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\GroupAddResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

//        var_dump($response->getResultItem());
//        var_dump($response->getFailAccount());
//        var_dump($response->getInvalidAccount());
//        var_dump($response->getCurrentSequence());

        $this->assertTrue($response->isSuccessful());
    }

    public function testGroupDelete()
    {
        $request = new GroupDeleteRequest('ak47', ['a', 'b']);
        /** @var \BiuBiuJun\QCloud\Tim\Responses\Sns\GroupDeleteResponse $response */
        $response = $this->getTimClient()->sendRequest($request);

        var_dump($response->getCurrentSequence());

        $this->assertTrue($response->isSuccessful());
    }
}
