<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenImDirtyWord;

use BiuBiuJun\QCloud\Kernel\BaseResponse;

/**
 * Class GetResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\OpenImDirtyWord
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
