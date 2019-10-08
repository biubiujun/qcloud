<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class QueryStateRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\OpenIm
 */
class QueryStateRequest extends BaseRequest
{
    /**
     * MultiAccountImport constructor.
     *
     * @param array $accounts
     */
    public function __construct(array $accounts)
    {
        $this->setAccounts($accounts);
    }

    public function getUri(): string
    {
        return 'v4/openim/querystate';
    }

    /**
     * @param array $accounts
     *
     * @return $this
     */
    public function setAccounts(array $accounts)
    {
        $this->setParameter('Accounts', $accounts);

        return $this;
    }
}
