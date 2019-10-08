<?php

namespace BiuBiuJun\QCloud\TIM\Requests\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class MultiAccountImportRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\ImOpenLoginSvc
 */
class MultiAccountImportRequest extends BaseRequest
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

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/im_open_login_svc/multiaccount_import';
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
