<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class BaseVodRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
abstract class BaseVodRequest extends BaseRequest
{
    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '2018-07-17';
    }
}
