<?php

namespace BiuBiuJun\QCloud\Trtc\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class RemoveUserRequest
 *
 * @package BiuBiuJun\QCloud\Trtc\Requests
 */
class RemoveUserRequest extends BaseRequest
{
    /**
     * RemoveUserRequest constructor.
     *
     * @param int   $sdkAppId
     * @param int   $roomId
     * @param array $userIds
     */
    public function __construct(int $sdkAppId, int $roomId, array $userIds)
    {
        $this->setSdkAppId($sdkAppId)
            ->setRoomId($roomId)
            ->setUserIds($userIds);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'RemoveUser';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '2019-07-22';
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return 'ap-guangzhou';
    }

    /**
     * @param int $sdkAppId
     *
     * @return $this
     */
    public function setSdkAppId(int $sdkAppId)
    {
        $this->setParameter('SdkAppId', $sdkAppId);

        return $this;
    }

    /**
     * @param int $roomId
     *
     * @return $this
     */
    public function setRoomId(int $roomId)
    {
        $this->setParameter('RoomId', $roomId);

        return $this;
    }

    /**
     * @param array $userIds
     *
     * @return $this
     */
    public function setUserIds(array $userIds)
    {
        $this->setParameter('UserIds', $userIds);

        return $this;
    }
}
