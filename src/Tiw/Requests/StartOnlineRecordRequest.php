<?php

namespace BiuBiuJun\QCloud\Tiw\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Tiw\Requests\Parameters\Concat;
use BiuBiuJun\QCloud\Tiw\Requests\Parameters\MixStream;
use BiuBiuJun\QCloud\Tiw\Requests\Parameters\Whiteboard;

/**
 * Class StartOnlineRecordRequest
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests
 */
class StartOnlineRecordRequest extends BaseRequest
{
    /**
     * StartOnlineRecordRequest constructor.
     *
     * @param int    $roomId
     * @param string $recordUserId
     * @param string $recordUserSig
     */
    public function __construct(int $roomId, string $recordUserId, string $recordUserSig)
    {
        $this->setRoomId($roomId)
            ->setRecordUserId($recordUserId)
            ->setRecordUserSig($recordUserSig);
    }

    /**
     * @param string $roomId
     *
     * @return $this
     */
    public function setRoomId(string $roomId)
    {
        $this->setParameter('RoomId', $roomId);

        return $this;
    }

    /**
     * @param string $recordUserId
     *
     * @return $this
     */
    public function setRecordUserId(string $recordUserId)
    {
        $this->setParameter('RecordUserId', $recordUserId);

        return $this;
    }

    /**
     * @param string $recordUserSig
     *
     * @return $this
     */
    public function setRecordUserSig(string $recordUserSig)
    {
        $this->setParameter('RecordUserSig', $recordUserSig);

        return $this;
    }

    /**
     * @param string $groupId
     *
     * @return $this
     */
    public function setGroupId(string $groupId)
    {
        $this->setParameter('GroupId', $groupId);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\Concat $concat
     *
     * @return $this
     */
    public function setConcat(Concat $concat)
    {
        $this->setParameter('Concat', $concat->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\Whiteboard $whiteboard
     *
     * @return $this
     */
    public function setWhiteboard(Whiteboard $whiteboard)
    {
        $this->setParameter('Whiteboard', $whiteboard->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\MixStream $mixStream
     *
     * @return $this
     */
    public function setMixStream(MixStream $mixStream)
    {
        $this->setParameter('MixStream', $mixStream->getParameters());

        return $this;
    }

    /**
     * @param array $extras
     *
     * @return $this
     */
    public function setExtras(array $extras)
    {
        $this->setParameter('Extras', $extras);

        return $this;
    }

    /**
     * @param bool $audioFileNeeded
     *
     * @return $this
     */
    public function setAudioFileNeeded(bool $audioFileNeeded)
    {
        $this->setParameter('AudioFileNeeded', $audioFileNeeded);

        return $this;
    }
}