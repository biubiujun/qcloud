<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\Concat;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStream;
use BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\Whiteboard;

/**
 * Class OnlineStartRequest
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Record
 */
class OnlineStartRequest extends BaseRequest
{
    /**
     * OnlineStartRequest constructor.
     *
     * @param int    $roomId
     * @param string $userId
     * @param string $userSig
     */
    public function __construct(int $roomId, string $userId, string $userSig)
    {
        $this->setRoomId($roomId)
            ->setUserId($userId)
            ->setUserSig($userSig);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'record/v1/online/start';
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
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId(string $userId)
    {
        $this->setParameter('user_id', $userId);

        return $this;
    }

    /**
     * @param string $userSig
     *
     * @return $this
     */
    public function setUserSig(string $userSig)
    {
        $this->setParameter('user_sig', $userSig);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\Concat $concat
     *
     * @return $this
     */
    public function setConcat(Concat $concat)
    {
        $this->setParameter('concat', $concat->getParameters());

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
     * @param array $extra
     *
     * @return $this
     */
    public function setExtra(array $extra)
    {
        $this->setParameter('extra', $extra);

        return $this;
    }
}
