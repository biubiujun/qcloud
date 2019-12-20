<?php

namespace BiuBiuJun\QCloud\Tiw\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class Concat
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests\Parameters
 */
class Concat extends BaseParameter
{
    /**
     * Concat constructor.
     *
     * @param bool   $enabled
     * @param string $image
     */
    public function __construct(bool $enabled, string $image = '')
    {
        $this->setEnabled($enabled)
            ->setImage($image);
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
     * @param string $image
     *
     * @return $this
     */
    public function setImage(string $image)
    {
        $this->setParameter('Image', $image);

        return $this;
    }
}
