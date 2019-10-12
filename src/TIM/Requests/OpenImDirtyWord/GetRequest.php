<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenImDirtyWord;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\OpenImDirtyWord
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
