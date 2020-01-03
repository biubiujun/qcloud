<?php

namespace BiuBiuJun\QCloud\Trtc\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class DismissRoomRequest
 *
 * @package BiuBiuJun\QCloud\Trtc\Requests
 */
class DismissRoomRequest extends BaseRequest
{
    public function __construct(int $sdkAppId, int $roomId)
    {
        $this->setSdkAPpId($sdkAppId)
            ->setRoomId($roomId);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'DismissRoom';
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
    public function setSdkAPpId(int $sdkAppId)
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
}
