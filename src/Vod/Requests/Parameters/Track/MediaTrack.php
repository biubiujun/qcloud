<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MediaTrack
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class MediaTrack extends BaseParameter
{
    /**
     * MediaTrack constructor.
     *
     * @param string $type
     * @param array  $trackItems
     */
    public function __construct(string $type, array $trackItems)
    {
        $this->setType($type)
            ->setTrackItems($trackItems);
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->setParameter('Type', $type);

        return $this;
    }

    /**
     * @param array $trackItems
     *
     * @return $this
     */
    public function setTrackItems(array $trackItems)
    {
        $result = [];
        foreach ($trackItems as $trackItem) {
            $result[] = $trackItem instanceof MediaTrackItem ? $trackItem->getParameters() : $trackItem;
        }

        $this->setParameter('TrackItems', $result);

        return $this;
    }
}
