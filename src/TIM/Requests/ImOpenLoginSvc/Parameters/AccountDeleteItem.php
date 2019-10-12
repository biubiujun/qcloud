<?php

namespace BiuBiuJun\QCloud\TIM\Requests\ImOpenLoginSvc\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

class AccountDeleteItem extends BaseParameter
{
    /**
     * AccountDeleteItemParameter constructor.
     *
     * @param string|array $userIds
     */
    public function __construct($userIds)
    {
        $this->setUserIds($userIds);
    }

    /**
     * @param string|array $userIds
     */
    public function setUserIds($userIds)
    {
        $parameters = [];
        foreach ($userIds as $userId) {
            $parameters[] = [
                'UserID' => $userId,
            ];
        }

        $this->parameters = $parameters;
    }
}
