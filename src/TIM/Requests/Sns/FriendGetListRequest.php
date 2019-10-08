<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class FriendGetListRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\Sns
 */
class FriendGetListRequest extends BaseRequest
{
    /**
     * FriendGetListRequest constructor.
     *
     * @param string       $fromAccount
     * @param string|array $toAccount
     * @param array        $tagList
     */
    public function __construct(string $fromAccount, $toAccount, array $tagList)
    {
        $this->setFromAccount($fromAccount)
            ->setToAccount($toAccount)
            ->setTagList($tagList);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_get_list';
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

    /**
     * @param string|array $toAccount
     *
     * @return $this
     */
    public function setToAccount($toAccount)
    {
        $this->setParameter('To_Account', is_array($toAccount) ? $toAccount : [$toAccount]);

        return $this;
    }

    public function setTagList(array $tagList)
    {
        $this->setParameter('TagList', $tagList);

        return $this;
    }
}
