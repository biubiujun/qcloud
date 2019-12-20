<?php

namespace BiuBiuJun\QCloud\Tiw\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MixStream
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests\Parameters
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
        $this->setParameter('Enabled', $enabled);

        return $this;
    }

    /**
     * @param bool $disableAudio
     *
     * @return $this
     */
    public function setDisableAudio(bool $disableAudio)
    {
        $this->setParameter('DisableAudio', $disableAudio);

        return $this;
    }

    /**
     * @param int $modelId
     *
     * @return $this
     */
    public function setModelId(int $modelId)
    {
        $this->setParameter('ModelId', $modelId);

        return $this;
    }

    /**
     * @param string $teacherId
     *
     * @return $this
     */
    public function setTeacherId(string $teacherId)
    {
        $this->setParameter('TeacherId', $teacherId);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\CustomLayout $customLayout
     *
     * @return $this
     */
    public function setCustom(CustomLayout $customLayout)
    {
        $this->setParameter('Custom', $customLayout->getParameters());

        return $this;
    }
}
