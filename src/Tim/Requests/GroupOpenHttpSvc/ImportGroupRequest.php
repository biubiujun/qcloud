<?php

namespace BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class ImportGroupRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\GroupOpenHttpSvc
 */
class ImportGroupRequest extends BaseRequest
{
    /**
     * ImportGroupRequest constructor.
     *
     * @param string $type
     * @param string $name
     * @param string $ownerAccount
     */
    public function __construct(string $type, string $name, string $ownerAccount = '')
    {
        $this->setType($type)
            ->setName($name)
            ->setOwnerAccount($ownerAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/import_group';
    }

    /**
     * @param string $ownerAccount
     *
     * @return $this
     */
    public function setOwnerAccount(string $ownerAccount)
    {
        $this->setParameter('Owner_Account', $ownerAccount);

        return $this;
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
        $this->setParameter('Introduction', $introduction);

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
    public function SetFaceUrl(string $faceUrl)
    {
        $this->setParameter('FaceUrl', $faceUrl);

        return $this;
    }

    /**
     * @param int $maxMemberCount
     *
     * @return $this
     */
    public function setMaxMemberCount(int $maxMemberCount)
    {
        $this->setParameter('MaxMemberCount', $maxMemberCount);

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

    /**
     * @param int $createTime
     *
     * @return $this
     */
    public function setCreateTime(int $createTime)
    {
        $this->setParameter('CreateTime', $createTime);

        return $this;
    }
}
