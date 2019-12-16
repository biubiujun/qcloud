<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Output;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class ComposerMediaOutput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class ComposerMediaOutput extends BaseParameter
{
    /**
     * ComposerMediaOutput constructor.
     *
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->setFileName($fileName);
    }

    /**
     * @param string $fileName
     *
     * @return $this
     */
    public function setFileName(string $fileName)
    {
        $this->setParameter('FileName', $fileName);

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
     * @param string $container
     *
     * @return $this
     */
    public function setContainer(string $container)
    {
        $this->setParameter('Container', $container);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Output\OutputVideoStream $outputVideoStream
     *
     * @return $this
     */
    public function setVideoStream(OutputVideoStream $outputVideoStream)
    {
        $this->setParameter('VideoStream', $outputVideoStream->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Output\OutputAudioStream $outputAudioStream
     *
     * @return $this
     */
    public function setAudioStream(OutputAudioStream $outputAudioStream)
    {
        $this->setParameter('AudioStream', $outputAudioStream->getParameters());

        return $this;
    }

    /**
     * @param int $removeVideo
     *
     * @return $this
     */
    public function setRemoveVideo(int $removeVideo)
    {
        $this->setParameter('RemoveVideo', $removeVideo);

        return $this;
    }

    /**
     * @param int $removeAudio
     *
     * @return $this
     */
    public function setRemoveAudio(int $removeAudio)
    {
        $this->setParameter('RemoveAudio', $removeAudio);

        return $this;
    }
}
