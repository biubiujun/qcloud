<?php

namespace BiuBiuJun\QCloud\TIM\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class FriendCustomItem
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters
 */
class FriendCustomItem extends BaseParameter
{
    public function setIM(string $tag, string $value)
    {
        $this->parameters[] = [
            'Tag' => "Tag_SNS_IM_{$tag}",
            'Value' => $value,
        ];
    }

    /**
     * @param string $tag
     * @param string $value
     */
    public function setCustom(string $tag, string $value)
    {
        $this->parameters[] = [
            'Tag' => "Tag_SNS_Custom_{$tag}",
            'Value' => $value,
        ];
    }
}
