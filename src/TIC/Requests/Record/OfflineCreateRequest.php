<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStream;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\Whiteboard;

/**
 * Class OfflineCreateRequest
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Record
 */
class OfflineCreateRequest extends BaseRequest
{
    /**
     * OfflineCreateRequest constructor.
     *
     * @param int $roomId
     */
    public function __construct(int $roomId)
    {
        $this->setRoomId($roomId);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'record/v1/offline/create';
    }

    /**
     * @param int $roomId
     *
     * @return $this
     */
    public function setRoomId(int $roomId)
    {
        $this->setParameter('room_id', $roomId);

        return $this;
    }

    /**
     * @param string $groupId
     *
     * @return $this
     */
    public function setGroupId(string $groupId)
    {
        $this->setParameter('group_id', $groupId);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStream $mixStream
     *
     * @return $this
     */
    public function setMixStream(MixStream $mixStream)
    {
        $this->setParameter('mix_stream', $mixStream->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\Whiteboard $whiteboard
     *
     * @return $this
     */
    public function setWhiteboard(Whiteboard $whiteboard)
    {
        $this->setParameter('whiteboard', $whiteboard->getParameters());

        return $this;
    }
}
