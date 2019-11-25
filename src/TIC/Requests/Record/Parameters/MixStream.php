<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

class MixStream extends BaseParameter
{
    public function __construct(bool $enabled)
    {
        $this->setEnabled($enabled);
    }

    public function setEnabled(bool $enabled)
    {
        $this->setParameter('enabled', $enabled);

        return $this;
    }

    public function setDisableAudio(bool $disableAudio)
    {
        $this->setParameter('disable_audio', $disableAudio);

        return $this;
    }

    public function setModelId(int $modelId)
    {
        $this->setParameter('model_id', $modelId);

        return $this;
    }

    public function setTeacherId(string $teacherId)
    {
        $this->setParameter('teacher_id', $teacherId);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStreamCustomLayout $customLayout
     *
     * @return $this
     */
    public function setCustom(MixStreamCustomLayout $customLayout)
    {
        $this->setParameter('custom', $customLayout->getParameters());

        return $this;
    }
}
