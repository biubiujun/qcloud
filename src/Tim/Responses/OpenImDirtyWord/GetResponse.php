<?php

namespace BiuBiuJun\QCloud\Tim\Responses\OpenImDirtyWord;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GetResponse
 *
 * @package BiuBiuJun\QCloud\TimClient\Responses\OpenImDirtyWord
 */
class GetResponse extends TimResponse
{
    /**
     * @return array
     */
    public function getDirtyWordsList()
    {
        return $this->content['DirtyWordsList'];
    }
}
