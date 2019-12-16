<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenImDirtyWord
 */
class GetRequest extends BaseRequest
{
    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/openim_dirty_words/get';
    }
}
