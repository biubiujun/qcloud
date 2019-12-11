<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ConfirmEventsRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class ConfirmEventsRequest extends BaseRequest
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
     * @return string
     */
    public function getVersion(): string
    {
        return '2018-07-17';
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
