<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendItem;

/**
 * Class FriendUpdateRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\Sns
 */
class FriendUpdateRequest extends BaseRequest
{
    /**
     * @var array
     */
    protected $updateItem = [];

    /**
     * FriendUpdateRequest constructor.
     *
     * @param string                                                         $fromAccount
     * @param array|\BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendItem $updateItem
     */
    public function __construct(string $fromAccount, $updateItem)
    {
        $this->setFromAccount($fromAccount)
            ->setUpdateItem($updateItem);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/friend_update';
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
     * @param array|\BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendItem $updateItem
     *
     * @return $this
     */
    public function setUpdateItem($updateItem)
    {
        if ($updateItem instanceof FriendItem) {
            $this->updateItem[] = $updateItem->getParameters();
        } else {
            foreach ($updateItem as $item) {
                $this->updateItem[] = $item instanceof FriendItem ? $item->getParameters() : $item;
            }
        }

        return $this;
    }

    /**
     * @param bool $filter
     *
     * @return array
     */
    public function getParameters($filter = true)
    {
        $this->setParameter('UpdateItem', $this->updateItem);

        return parent::getParameters($filter);
    }
}
