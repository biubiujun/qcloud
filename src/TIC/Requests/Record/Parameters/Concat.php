<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class Concat
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Record\Parameters
 */
class Concat extends BaseParameter
{
    /**
     * Concat constructor.
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
     * @param string $image
     *
     * @return $this
     */
    public function setImage(string $image)
    {
        $this->setParameter('image', $image);

        return $this;
    }
}
