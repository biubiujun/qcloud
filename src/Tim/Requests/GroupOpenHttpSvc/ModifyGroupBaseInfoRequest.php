<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ModifyGroupBaseInfoRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc
 */
class ModifyGroupBaseInfoRequest extends BaseRequest
{
    /**
     * ModifyGroupBaseInfoRequest constructor.
     *
     * @param string $groupId
     */
    public function __construct(string $groupId)
    {
        $this->setGroupId($groupId);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/modify_group_base_info';
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
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->setParameter('Name', $name);

        return $this;
    }

    /**
     * @param string $introduction
     *
     * @return $this
     */
    public function setIntroduction(string $introduction)
    {
        $this->setParameter('Name', $introduction);

        return $this;
    }

    /**
     * @param string $notification
     *
     * @return $this
     */
    public function setNotification(string $notification)
    {
        $this->setParameter('Notification', $notification);

        return $this;
    }

    /**
     * @param string $faceUrl
     *
     * @return $this
     */
    public function setFaceUrl(string $faceUrl)
    {
        $this->setParameter('FaceUrl', $faceUrl);

        return $this;
    }

    /**
     * @param int $maxMemberNum
     *
     * @return $this
     */
    public function setMaxMemberNum(int $maxMemberNum)
    {
        $this->setParameter('MaxMemberNum', $maxMemberNum);

        return $this;
    }

    /**
     * @param string $applyJoinOption
     *
     * @return $this
     */
    public function setApplyJoinOption(string $applyJoinOption)
    {
        $this->setParameter('ApplyJoinOption', $applyJoinOption);

        return $this;
    }

    /**
     * @param array $appDefinedData
     *
     * @return $this
     */
    public function setAppDefinedData(array $appDefinedData)
    {
        $this->setParameter('AppDefinedData', $appDefinedData);

        return $this;
    }
}
