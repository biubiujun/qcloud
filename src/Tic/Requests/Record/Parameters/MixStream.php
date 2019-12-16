<?php

namespace BiuBiuJun\QCloud\Tic\Requests\Record\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MixStream
 *
 * @package BiuBiuJun\QCloud\Tic\Requests\Record\Parameters
 */
class MixStream extends BaseParameter
{
    /**
     * MixStream constructor.
     *
     * @param bool $enabled
     */
    public function __construct(bool $enabled)
    {
        $this->setEnabled($enabled);
    }

    /**
     * @param bool $enabled
     *
     * @return $this
     */
    public function setEnabled(bool $enabled)
    {
        $this->setParameter('enabled', $enabled);

        return $this;
    }

    /**
     * @param bool $disableAudio
     *
     * @return $this
     */
    public function setDisableAudio(bool $disableAudio)
    {
        $this->setParameter('disable_audio', $disableAudio);

        return $this;
    }

    /**
     * @param int $modelId
     *
     * @return $this
     */
    public function setModelId(int $modelId)
    {
        $this->setParameter('model_id', $modelId);

        return $this;
    }

    /**
     * @param string $teacherId
     *
     * @return $this
     */
    public function setTeacherId(string $teacherId)
    {
        $this->setParameter('teacher_id', $teacherId);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Tic\Requests\Record\Parameters\MixStreamCustomLayout $customLayout
     *
     * @return $this
     */
    public function setCustom(MixStreamCustomLayout $customLayout)
    {
        $this->setParameter('custom', $customLayout->getParameters());

        return $this;
    }
}
