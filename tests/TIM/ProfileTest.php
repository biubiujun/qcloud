<?php

namespace BiuBiuJun\Tests\TIM;

use BiuBiuJun\QCloud\TIM\Constants\Portrait;
use BiuBiuJun\QCloud\TIM\Requests\Profile\Parameters\ProfileItem;
use BiuBiuJun\QCloud\TIM\Requests\Profile\PortraitGetRequest;
use BiuBiuJun\QCloud\TIM\Requests\Profile\PortraitSetRequest;
use BiuBiuJun\Tests\TestCase;

class ProfileTest extends TestCase
{
    public function testPortraitGet()
    {
        $request = new PortraitGetRequest('ak47', [
            Portrait::TAG_NICK,
            Portrait::TAG_ALLOW_TYPE,
            Portrait::TAG_SELF_SIGNATURE,
        ]);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Profile\PortraitGetResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

//        var_dump($response->getUserProfileItem());

        $this->assertTrue($response->isSuccessful());
    }

    public function testPortraitSet()
    {
        $profileItem = new ProfileItem();
        $profileItem->setNick('biubiubiu')
            ->setGender(Portrait::GENDER_TYPE_UNKNOWN);
        $request = new PortraitSetRequest('ak47', $profileItem);
        /** @var \BiuBiuJun\QCloud\TIM\Responses\Profile\PortraitSetResponse $response */
        $response = $this->getTIMClient()->sendRequest($request);

        $this->assertTrue($response->isSuccessful());
    }
}
