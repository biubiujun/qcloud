<?php

namespace BiuBiuJun\QCloud\Tim\Requests\Sns;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class BlackListDeleteRequest
 *
 * @package BiuBiuJun\QCloud\TimClient\Requests\Sns
 */
class BlackListDeleteRequest extends BaseRequest
{
    /**
     * BlackListAddRequest constructor.
     *
     * @param string       $fromAccount
     * @param string|array $toAccount
     */
    public function __construct(string $fromAccount, $toAccount)
    {
        $this->setFromAccount($fromAccount)
            ->setToAccount($toAccount);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/sns/black_list_delete';
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
     * @param string|array $toAccount
     *
     * @return $this
     */
    public function setToAccount($toAccount)
    {
        $this->setParameter('To_Account', is_array($toAccount) ? $toAccount : [$toAccount]);

        return $this;
    }
}
