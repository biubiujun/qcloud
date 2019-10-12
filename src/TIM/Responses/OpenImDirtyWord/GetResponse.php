<?php

namespace BiuBiuJun\QCloud\TIM\Responses\OpenImDirtyWord;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetResponse
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenImDirtyWord
 */
class GetResponse extends BaseResponse
{
    /**
     * @return array
     */
    public function getDirtyWordsList()
    {
        return $this->content['DirtyWordsList'];
    }
}
