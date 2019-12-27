<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

/**
 * Class PullUploadRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class PullUploadRequest extends BaseVodRequest
{
    /**
     * PullUploadRequest constructor.
     *
     * @param string $mediaUrl
     */
    public function __construct(string $mediaUrl)
    {
        $this->setMediaUrl($mediaUrl);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'PullUpload';
    }

    /**
     * @param string $mediaUrl
     *
     * @return $this
     */
    public function setMediaUrl(string $mediaUrl)
    {
        $this->setParameter('MediaUrl', $mediaUrl);

        return $this;
    }

    /**
     * @param string $mediaName
     *
     * @return $this
     */
    public function setMediaName(string $mediaName)
    {
        $this->setParameter('MediaName', $mediaName);

        return $this;
    }

    /**
     * @param string $coverUrl
     *
     * @return $this
     */
    public function setCoverUrl(string $coverUrl)
    {
        $this->setParameter('CoverUrl', $coverUrl);

        return $this;
    }

    /**
     * @param string $procedure
     *
     * @return $this
     */
    public function setProcedure(string $procedure)
    {
        $this->setParameter('Procedure', $procedure);

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
     * @param string $storageRegion
     *
     * @return $this
     */
    public function setStorageRegion(string $storageRegion)
    {
        $this->setParameter('StorageRegion', $storageRegion);

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
     * @param string $sessionContext
     *
     * @return $this
     */
    public function setSessionContext(string $sessionContext)
    {
        $this->setParameter('SessionContext', $sessionContext);

        return $this;
    }

    /**
     * @param string $sessionId
     *
     * @return $this
     */
    public function setSessionId(string $sessionId)
    {
        $this->setParameter('SessionId', $sessionId);

        return $this;
    }

    /**
     * @param string $extInfo
     *
     * @return $this
     */
    public function setExtInfo(string $extInfo)
    {
        $this->setParameter('ExtInfo', $extInfo);

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
