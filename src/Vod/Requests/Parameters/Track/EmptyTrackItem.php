<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class EmptyTrackItem
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class EmptyTrackItem extends BaseParameter
{
    /**
     * EmptyTrackItem constructor.
     *
     * @param float $duration
     */
    public function __construct(float $duration)
    {
        $this->setDuration($duration);
    }

    /**
     * @param float $duration
     *
     * @return $this
     */
    public function setDuration(float $duration)
    {
        $this->setParameter('Duration', $duration);

        return $this;
    }
}
