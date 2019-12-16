<?php

namespace BiuBiuJun\QCloud\Vod\Responses;

/**
 * Class DescribeMediaInfosResponse
 *
 * @package BiuBiuJun\QCloud\Vod\Responses
 */
class DescribeMediaInfosResponse extends VodResponse
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

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->content['RequestId'];
    }
}
