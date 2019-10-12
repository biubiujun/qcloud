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
    /**
     * @param string       $tag
     * @param string|array $value
     */
    public function setIMTag(string $tag, $value)
    {
        $this->parameters[] = [
            'Tag' => "Tag_SNS_IM_{$tag}",
            'Value' => $value,
        ];
    }

    /**
     * @param string       $tag
     * @param string|array $value
     */
    public function setCustomTag(string $tag, $value)
    {
        $this->parameters[] = [
            'Tag' => "Tag_SNS_Custom_{$tag}",
            'Value' => $value,
        ];
    }
}
