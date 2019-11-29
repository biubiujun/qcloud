<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class FriendGetResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\Sns
 */
class FriendGetResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getUserDataItem()
    {
        return $this->content['UserDataItem'];
    }

    /**
     * @return int
     */
    public function getStandardSequence()
    {
        return $this->content['StandardSequence'];
    }

    /**
     * @return int
     */
    public function getCustomSequence()
    {
        return $this->content['CustomSequence'];
    }

    /**
     * @return int
     */
    public function getFriendNum()
    {
        return $this->content['FriendNum'];
    }

    /**
     * @return int
     */
    public function getCompleteFlag()
    {
        return $this->content['CompleteFlag'];
    }

    /**
     * @return int
     */
    public function getNextStartIndex()
    {
        return $this->content['NextStartIndex'];
    }
}
