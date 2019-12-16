<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Output;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class OutputAudioStream
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Output
 */
class OutputAudioStream extends BaseParameter
{
    /**
     * OutputAudioStream constructor.
     *
     * @param string $codec
     * @param int    $sampleRate
     * @param int    $audioChannel
     */
    public function __construct(string $codec = 'libfdk_acc', int $sampleRate = 16000, int $audioChannel = 2)
    {
        $this->setCodec($codec)
            ->setSampleRate($sampleRate)
            ->setAudioChannel($audioChannel);
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
     * @param int $sampleRate
     *
     * @return $this
     */
    public function setSampleRate(int $sampleRate)
    {
        $this->setParameter('SampleRate', $sampleRate);

        return $this;
    }

    /**
     * @param int $audioChannel
     *
     * @return $this
     */
    public function setAudioChannel(int $audioChannel)
    {
        $this->setParameter('AudioChannel', $audioChannel);

        return $this;
    }
}
