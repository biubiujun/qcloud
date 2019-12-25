<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class CreateTranscodeRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class CreateTranscodeRequest extends BaseRequest
{
    /**
     * CreateTranscodeRequest constructor.
     *
     * @param int    $sdkAppId
     * @param string $url
     * @param bool   $isStaticPPT
     */
    public function __construct(int $sdkAppId, string $url, bool $isStaticPPT = false)
    {
        $this->setSdkAppId($sdkAppId)
            ->setUrl($url)
            ->setIsStaticPPT($isStaticPPT);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'CreateTranscode';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '2019-09-19';
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return 'ap-guangzhou';
    }

    /**
     * @param int $sdkAppId
     *
     * @return $this
     */
    public function setSdkAppId(int $sdkAppId)
    {
        $this->setParameter('SdkAppId', $sdkAppId);

        return $this;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->setParameter('Url', $url);

        return $this;
    }

    /**
     * @param bool $isStaticPPT
     *
     * @return $this
     */
    public function setIsStaticPPT(bool $isStaticPPT)
    {
        $this->setParameter('IsStaticPPT', $isStaticPPT);

        return $this;
    }

    /**
     * @param string $minResolution
     *
     * @return $this
     */
    public function setMinResolution(string $minResolution)
    {
        $this->setParameter('MinResolution', $minResolution);

        return $this;
    }

    /**
     * @param string $thumbnailResolution
     *
     * @return $this
     */
    public function setThumbnailResolution(string $thumbnailResolution)
    {
        $this->setParameter('ThumbnailResolution', $thumbnailResolution);

        return $this;
    }

    /**
     * @param string $compressFileType
     *
     * @return $this
     */
    public function setCompressFileType(string $compressFileType)
    {
        $this->setParameter('CompressFileType', $compressFileType);

        return $this;
    }
}
