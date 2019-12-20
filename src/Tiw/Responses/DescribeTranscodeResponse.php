<?php

namespace BiuBiuJun\QCloud\Tiw\Responses;

use BiuBiuJun\QCloud\Kernel\BaseTcResponse;

/**
 * Class DescribeTranscodeResponse
 *
 * @package BiuBiuJun\QCloud\Tiw\Responses
 */
class DescribeTranscodeResponse extends BaseTcResponse
{
    /**
     * @return int
     */
    public function getPages()
    {
        return $this->content['Pages'];
    }

    /**
     * @return int
     */
    public function getProgress()
    {
        return $this->content['Progress'];
    }

    /**
     * @return string
     */
    public function getResolution()
    {
        return $this->content['Resolution'];
    }

    /**
     * @return string
     */
    public function getResultUrl()
    {
        return $this->content['ResultUrl'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->content['Status'];
    }

    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->content['TaskId'];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->content['Title'];
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->content['ThumbnailUrl'];
    }

    /**
     * @return string
     */
    public function getThumbnailResolution()
    {
        return $this->content['ThumbnailResolution'];
    }

    /**
     * @return string
     */
    public function getCompressFileUrl()
    {
        return $this->content['CompressFileUrl'];
    }
}
