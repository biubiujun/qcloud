<?php

namespace BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class AccountDeleteItem
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\Parameters
 */
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
