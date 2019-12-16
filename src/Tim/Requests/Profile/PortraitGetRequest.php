<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Profile;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class PortraitGetRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\Profile
 */
class PortraitGetRequest extends BaseRequest
{
    /**
     * PortraitGetRequest constructor.
     *
     * @param string|array $toAccount
     * @param array        $tagList
     */
    public function __construct($toAccount, array $tagList)
    {
        $this->setToAccount($toAccount)
            ->setTagList($tagList);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/profile/portrait_get';
    }

    /**
     * @param string|array $toAccount
     *
     * @return $this
     */
    public function setToAccount($toAccount)
    {
        $this->setParameter('To_Account', is_array($toAccount) ? $toAccount : [$toAccount]);

        return $this;
    }

    /**
     * @param array $tagList
     *
     * @return $this
     */
    public function setTagList(array $tagList)
    {
        $this->setParameter('TagList', $tagList);

        return $this;
    }
}
