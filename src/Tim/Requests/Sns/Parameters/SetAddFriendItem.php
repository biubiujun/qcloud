<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters;

/**
 * Trait SetAddFriendItem
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters
 */
trait SetAddFriendItem
{
    /**
     * @var array
     */
    protected $addFriendItem = [];

    /**
     * @param array|\BiuBiuJun\QCloud\Tim\Requests\Sns\Parameters\FriendItem $addFriendItem
     *
     * @return $this
     */
    public function setAddFriendItem($addFriendItem)
    {
        if ($addFriendItem instanceof FriendItem) {
            $this->addFriendItem[] = $addFriendItem->getParameters();
        } elseif (is_array($addFriendItem)) {
            foreach ($addFriendItem as $item) {
                $this->addFriendItem[] = $item instanceof FriendItem ? $item->getParameters() : $item;
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
        $this->setParameter('AddFriendItem', $this->addFriendItem);

        return parent::getParameters($filter);
    }
}
