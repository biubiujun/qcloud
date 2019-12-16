<?php

namespace BiuBiuJun\QCloud\Tim\Requests\OpenIm;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class QueryStateRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\OpenIm
 */
class QueryStateRequest extends BaseRequest
{
    /**
     * MultiAccountImport constructor.
     *
     * @param string|array $accounts
     */
    public function __construct($accounts)
    {
        $this->setAccounts($accounts);
    }

    public function getUri(): string
    {
        return 'v4/openim/querystate';
    }

    /**
     * @param string|array $accounts
     *
     * @return $this
     */
    public function setAccounts($accounts)
    {
        $this->setParameter('Accounts', is_array($accounts) ? $accounts : [$accounts]);

        return $this;
    }
}
