<?php

namespace BiuBiuJun\QCloud\TIM\Requests\Profile\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class Portrait
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters
 */
class ProfileItem extends BaseParameter
{
    /**
     * Portrait constructor.
     *
     * @param string $nick
     */
    public function __construct(string $nick = '')
    {
        $this->setNick($nick);
    }

    /**
     * @param string $nick
     *
     * @return $this
     */
    public function setNick(string $nick)
    {
        $this->setParameter('Tag_Profile_IM_Nick', $nick);

        return $this;
    }

    /**
     * @param string $gender
     *
     * @return $this
     */
    public function setGender(string $gender)
    {
        $this->setParameter('Tag_Profile_IM_Gender', $gender);

        return $this;
    }

    /**
     * @param int $birthday
     *
     * @return $this
     */
    public function setBirthDay(int $birthday)
    {
        $this->setParameter('Tag_Profile_IM_BirthDay', $birthday);

        return $this;
    }

    /**
     * @param string $location
     *
     * @return $this
     */
    public function setLocation(string $location)
    {
        $this->setParameter('Tag_Profile_IM_Location', $location);

        return $this;
    }

    /**
     * @param string $selfSignature
     *
     * @return $this
     */
    public function setSelfSignature(string $selfSignature)
    {
        $this->setParameter('Tag_Profile_IM_SelfSignature', $selfSignature);

        return $this;
    }

    /**
     * @param string $allowType
     *
     * @return $this
     */
    public function setAllowType(string $allowType)
    {
        $this->setParameter('Tag_Profile_IM_AllowType', $allowType);

        return $this;
    }

    /**
     * @param int $language
     *
     * @return $this
     */
    public function setLanguage(int $language)
    {
        $this->setParameter('Tag_Profile_IM_Language', $language);

        return $this;
    }

    /**
     * @param string $image
     *
     * @return $this
     */
    public function setImage(string $image)
    {
        $this->setParameter('Tag_Profile_IM_Image', $image);

        return $this;
    }

    /**
     * @param int $msgSettings
     *
     * @return $this
     */
    public function setMsgSettings(int $msgSettings)
    {
        $this->setParameter('Tag_Profile_IM_MsgSettings', $msgSettings);

        return $this;
    }

    /**
     * @param string $adminForbidType
     *
     * @return $this
     */
    public function setAdminForbidType(string $adminForbidType)
    {
        $this->setParameter('Tag_Profile_IM_AdminForbidType', $adminForbidType);

        return $this;
    }

    /**
     * @param int $level
     *
     * @return $this
     */
    public function setLevel(int $level)
    {
        $this->setParameter('Tag_Profile_IM_Level', $level);

        return $this;
    }

    /**
     * @param int $role
     *
     * @return $this
     */
    public function setRole(int $role)
    {
        $this->setParameter('Tag_Profile_IM_Role', $role);

        return $this;
    }

    /**
     * @return array
     */
    public function transform()
    {
        $parameters = [];
        foreach ($this->parameters as $key => $value) {
            $parameters[] = [
                'Tag' => $key,
                'Value' => $value,
            ];
        }

        return $parameters;
    }
}
