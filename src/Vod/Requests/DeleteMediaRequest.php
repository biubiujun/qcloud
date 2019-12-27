<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

/**
 * Class DeleteMediaRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class DeleteMediaRequest extends BaseVodRequest
{
    /**
     * DeleteMediaRequest constructor.
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
        return 'DeleteMedia';
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
     * @param array $deleteParts
     *
     * @return $this
     */
    public function setDeleteParts(array $deleteParts)
    {
        $this->setParameter('DeleteParts', $deleteParts);

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
