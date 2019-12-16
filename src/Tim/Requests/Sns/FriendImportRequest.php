<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\SetAddFriendItem;

/**
 * Class FriendImportRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\Sns
 */
class FriendImportRequest extends BaseRequest
{
    use SetAddFriendItem;

    /**
     * FriendImportRequest constructor.
     *
     * @param string                                                         $fromAccount
     * @param array|\BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendItem $addFriendItem
     */
    public function __construct(string $fromAccount, $addFriendItem)
    {
        $this->setFromAccount($fromAccount)
            ->setAddFriendItem($addFriendItem);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_import';
    }

    /**
     * @param string $fromAccount
     *
     * @return $this
     */
    public function setFromAccount(string $fromAccount)
    {
        $this->setParameter('From_Account', $fromAccount);

        return $this;
    }
}
