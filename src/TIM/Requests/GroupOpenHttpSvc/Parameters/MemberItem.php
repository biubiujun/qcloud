<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MemberItem
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc\Parameters
 */
class MemberItem extends BaseParameter
{
    /**
     * MemberItem constructor.
     *
     * @param string $memberAccount
     */
    public function __construct(string $memberAccount)
    {
        $this->setMemberAccount($memberAccount);
    }

    /**
     * @var array
     */
    protected $appMemberDefinedData;

    /**
     * @param string $memberAccount
     *
     * @return $this
     */
    public function setMemberAccount(string $memberAccount)
    {
        $this->setParameter('Member_Account', $memberAccount);

        return $this;
    }

    /**
     * @param string $role
     *
     * @return $this
     */
    public function setRole(string $role)
    {
        $this->setParameter('ROle', $role);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function setAppMemberDefinedData(string $key, string $value)
    {
        $this->appMemberDefinedData[] = [
            'Key' => $key,
            'Value' => $value,
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        $this->setParameter('AppMemberDefinedData', $this->appMemberDefinedData);

        return parent::getParameters();
    }
}
