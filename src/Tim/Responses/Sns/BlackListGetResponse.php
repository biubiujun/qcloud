<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class BlackListDeleteResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\Sns
 */
class BlackListGetResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getBlackListItem()
    {
        return $this->content['BlackListItem'];
    }

    /**
     * @return int
     */
    public function getStartIndex()
    {
        return $this->content['StartIndex'];
    }

    /**
     * @return int
     */
    public function getCurruentSequence()
    {
        // 此处接口返回拼写就是错误的
        return $this->content['CurruentSequence'];
    }
}
