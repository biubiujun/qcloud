<?php

namespace BiuBiuJun\QCloud\Tiw\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class StreamLayout
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests\Parameters
 */
class StreamLayout extends BaseParameter
{
    /**
     * StreamLayout constructor.
     *
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\LayoutParams $layoutParams
     * @param string                                                 $inputStreamId
     * @param string                                                 $backgroundColor
     */
    public function __construct(LayoutParams $layoutParams, string $inputStreamId = '', string $backgroundColor = '')
    {
        $this->setLayoutParams($layoutParams)
            ->setInputStreamId($inputStreamId)
            ->setBackgroundColor($backgroundColor);
    }

    /**
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\LayoutParams $layoutParams
     *
     * @return $this
     */
    public function setLayoutParams(LayoutParams $layoutParams)
    {
        $this->setParameter('LayoutParams', $layoutParams->getParameters());

        return $this;
    }

    /**
     * @param string $inputStreamId
     *
     * @return $this
     */
    public function setInputStreamId(string $inputStreamId)
    {
        $this->setParameter('InputStreamId', $inputStreamId);

        return $this;
    }

    /**
     * @param string $backgroundColor
     *
     * @return $this
     */
    public function setBackgroundColor(string $backgroundColor)
    {
        $this->setParameter('BackgroundColor', $backgroundColor);

        return $this;
    }
}
