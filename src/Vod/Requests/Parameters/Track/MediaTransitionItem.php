<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MediaTransitionItem
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class MediaTransitionItem extends BaseParameter
{
    /**
     * MediaTransitionItem constructor.
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

    /**
     * @param array $transitions
     *
     * @return $this
     */
    public function setTransitions(array $transitions)
    {
        $result = [];
        foreach ($transitions as $transition) {
            $result[] = $transition instanceof TransitionOperation ? $transition->getParameters() : $transition;
        }

        $this->setParameter('Transitions', $result);

        return $this;
    }
}
