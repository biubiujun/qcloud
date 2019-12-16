<?php

namespace BiuBiuJun\QCloud\Tim\Responses\Sns;

use BiuBiuJun\QCloud\Tim\Responses\TimResponse;

/**
 * Class GroupDeleteResponse
 *
 * @package BiuBiuJun\QCloud\Tim\Responses\Sns
 */
class GroupDeleteResponse extends TimResponse
{
    /**
     * @return int
     */
    public function getCurrentSequence()
    {
        return $this->content['CurrentSequence'];
    }
}
