<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class BlackListGetRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\Sns
 */
class BlackListGetRequest extends BaseRequest
{
    /**
     * BlackListGetRequest constructor.
     *
     * @param string $fromAccount
     * @param int    $startIndex
     * @param int    $maxLimited
     * @param int    $lastSequence
     */
    public function __construct(string $fromAccount, int $startIndex = 0, int $maxLimited = 30, int $lastSequence = 0)
    {
        $this->setFromAccount($fromAccount)
            ->setStartIndex($startIndex)
            ->setMaxLimited($maxLimited)
            ->setLastSequence($lastSequence);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/black_list_get';
    }

    /**
     * @param string $fromAccount
     *
     * @return $this
     */
    public function setFromAccount(string $fromAccount)
    {
        $this->setParameter('From_Account', $fromAccount);

        return $this;
    }

    /**
     * @param int $startIndex
     *
     * @return $this
     */
    public function setStartIndex(int $startIndex)
    {
        $this->setParameter('StartIndex', $startIndex);

        return $this;
    }

    /**
     * @param int $maxLimited
     *
     * @return $this
     */
    public function setMaxLimited(int $maxLimited)
    {
        $this->setParameter('MaxLimited', $maxLimited);

        return $this;
    }

    /**
     * @param int $lastSequence
     *
     * @return $this
     */
    public function setLastSequence(int $lastSequence)
    {
        $this->setParameter('LastSequence', $lastSequence);

        return $this;
    }
}
