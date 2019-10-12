<?php

namespace BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class DeleteGroupMemberRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\GroupOpenHttpSvc
 */
class DeleteGroupMemberRequest extends BaseRequest
{
    /**
     * DeleteGroupMemberRequest constructor.
     *
     * @param string       $groupId
     * @param string|array $memberToDelAccount
     */
    public function __construct(string $groupId, $memberToDelAccount)
    {
        $this->setGroupId($groupId)
            ->setMemberToDelAccount($memberToDelAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/group_open_http_svc/add_group_member';
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
     * @param int $silence
     *
     * @return $this
     */
    public function setSilence(int $silence)
    {
        $this->setParameter('Silence', $silence);

        return $this;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setReason(string $reason)
    {
        $this->setParameter('Reason', $reason);

        return $this;
    }

    /**
     * @param string|array $memberToDelAccount
     *
     * @return $this
     */
    public function setMemberToDelAccount($memberToDelAccount)
    {
        $this->setParameter('MemberToDel_Account', is_array($memberToDelAccount) ? $memberToDelAccount : [$memberToDelAccount]);

        return $this;
    }
}
