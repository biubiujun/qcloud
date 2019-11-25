<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Transcode;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class TranscodeCreateRequest
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Transcode
 */
class TranscodeCreateRequest extends BaseRequest
{
    /**
     * TranscodeCreateRequest constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'transcode/v1/create';
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->setParameter('url', $url);

        return $this;
    }

    /**
     * @param bool $isStaticPpt
     *
     * @return $this
     */
    public function setIsStaticPpt(bool $isStaticPpt)
    {
        $this->setParameter('is_static_ppt', $isStaticPpt);

        return $this;
    }
}
