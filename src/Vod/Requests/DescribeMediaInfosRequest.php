<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

/**
 * Class DescribeMediaInfosRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class DescribeMediaInfosRequest extends BaseVodRequest
{
    /**
     * DescribeMediaInfosRequest constructor.
     *
     * @param array $fileIds
     */
    public function __construct(array $fileIds)
    {
        $this->setFileIds($fileIds);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'DescribeMediaInfos';
    }

    /**
     * @param array $fileIds
     *
     * @return $this
     */
    public function setFileIds(array $fileIds)
    {
        $this->setParameter('FileIds', $fileIds);

        return $this;
    }

    /**
     * @param array $filters
     *
     * @return $this
     */
    public function setFilters(array $filters)
    {
        $this->setParameter('Filters', $filters);

        return $this;
    }

    /**
     * @param int $subAppId
     *
     * @return $this
     */
    public function setSubAppId(int $subAppId)
    {
        $this->setParameter('SubAppId', $subAppId);

        return $this;
    }
}
