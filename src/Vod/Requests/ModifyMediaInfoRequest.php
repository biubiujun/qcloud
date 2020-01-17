<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

/**
 * Class ModifyMediaInfoRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class ModifyMediaInfoRequest extends BaseVodRequest
{
    /**
     * ModifyMediaInfoRequest constructor.
     *
     * @param string $fileId
     */
    public function __construct(string $fileId)
    {
        $this->setFileId($fileId);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'ModifyMediaInfo';
    }

    /**
     * @param string $fileId
     *
     * @return $this
     */
    public function setFileId(string $fileId)
    {
        $this->setParameter('FileId', $fileId);

        return $this;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->setParameter('Name', $name);

        return $this;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->setParameter('Description', $description);

        return $this;
    }

    /**
     * @param int $classId
     *
     * @return $this
     */
    public function setClassId(int $classId)
    {
        $this->setParameter('ClassId', $classId);

        return $this;
    }

    /**
     * @param string $expireTime
     *
     * @return $this
     */
    public function setExpireTime(string $expireTime)
    {
        $this->setParameter('ExpireTime', $expireTime);

        return $this;
    }

    /**
     * @param string $coverData
     *
     * @return $this
     */
    public function setCoverData(string $coverData)
    {
        $this->setParameter('CoverData', $coverData);

        return $this;
    }

    /**
     * @param array $addKeyFrameDescs
     *
     * @return $this
     */
    public function setADdKeyFrameDescs(array $addKeyFrameDescs)
    {
        $this->setParameter('AddKeyFrameDescs', $addKeyFrameDescs);

        return $this;
    }

    /**
     * @param array $clearKeyFrameDescs
     *
     * @return $this
     */
    public function setClearKeyFrameDescs(array $clearKeyFrameDescs)
    {
        $this->setParameter('ClearKeyFrameDescs', $clearKeyFrameDescs);

        return $this;
    }

    /**
     * @param array $addTags
     *
     * @return $this
     */
    public function setAddTags(array $addTags)
    {
        $this->setParameter('AddTags', $addTags);

        return $this;
    }

    /**
     * @param array $deleteTags
     *
     * @return $this
     */
    public function setDeleteTags(array $deleteTags)
    {
        $this->setParameter('DeleteTags', $deleteTags);

        return $this;
    }

    /**
     * @param int $clearTags
     *
     * @return $this
     */
    public function setClearTags(int $clearTags)
    {
        $this->setParameter('ClearTags', $clearTags);

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
