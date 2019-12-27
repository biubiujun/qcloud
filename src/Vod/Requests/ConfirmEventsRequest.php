<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

/**
 * Class ConfirmEventsRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class ConfirmEventsRequest extends BaseVodRequest
{
    /**
     * ConfirmEventsRequest constructor.
     *
     * @param array $evenHandles
     */
    public function __construct(array $evenHandles)
    {
        $this->setEventHandles($evenHandles);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'ConfirmEvents';
    }

    /**
     * @param array $eventHandles
     *
     * @return $this
     */
    public function setEventHandles(array $eventHandles)
    {
        $this->setParameter('EventHandles', $eventHandles);

        return $this;
    }

    /**
     * @param int $subAppId
     *
     * @return $this
     */
    public function setSubAppId(int $subAppId)
    {
        $this->setParameter('SubAppId', $subAppId);

        return $this;
    }
}
