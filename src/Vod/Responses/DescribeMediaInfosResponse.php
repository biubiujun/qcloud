<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class DescribeMediaInfosResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class DescribeMediaInfosResponse extends BaseTcResponse
{
    /**
     * @return array
     */
    public function getMediaInfoSet()
    {
        return $this->content['MediaInfoSet'];
    }

    /**
     * @return string
     */
    public function getNotExistFileIdSet()
    {
        return $this->content['NotExistFileIdSet'];
    }
}
