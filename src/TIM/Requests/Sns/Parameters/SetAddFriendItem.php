<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Sns\Parameters;

trait SetAddFriendItem
{
    /**
     * @var array
     */
    protected $addFriendItem = [];

    /**
     * @param array|\BiuBiuJun\QCloud\TIM\Requests\Sns\Parameters\FriendItem $addFriendItem
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
     * @return array
     */
    public function getParameters()
    {
        $this->setParameter('AddFriendItem', $this->addFriendItem);

        return parent::getParameters();
    }
}
