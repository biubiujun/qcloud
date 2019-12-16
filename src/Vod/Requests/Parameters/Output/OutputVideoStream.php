<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Output;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class OutputVideoStream
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Output
 */
class OutputVideoStream extends BaseParameter
{
    /**
     * OutputVideoStream constructor.
     *
     * @param string $codec
     * @param int    $fps
     */
    public function __construct(string $codec = 'libx264', int $fps = 0)
    {
        $this->setCodec($codec)
            ->setFps($fps);
    }

    /**
     * @param string $codec
     *
     * @return $this
     */
    public function setCodec(string $codec)
    {
        $this->setParameter('Codec', $codec);

        return $this;
    }

    /**
     * @param int $fps
     *
     * @return $this
     */
    public function setFps(int $fps)
    {
        $this->setParameter('Fps', $fps);

        return $this;
    }
}
