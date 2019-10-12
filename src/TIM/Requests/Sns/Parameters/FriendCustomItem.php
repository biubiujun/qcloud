<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Sns\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class FriendCustomItem
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters
 */
class FriendCustomItem extends BaseParameter
{
    public function setIMTag(string $tag, string $value)
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
    public function setCustomTag(string $tag, string $value)
    {
        $this->parameters[] = [
            'Tag' => "Tag_SNS_Custom_{$tag}",
            'Value' => $value,
        ];
    }
}
