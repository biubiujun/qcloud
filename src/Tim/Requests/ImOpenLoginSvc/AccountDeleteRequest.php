<?php

namespace BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\Parameters\AccountDeleteItem;

/**
 * Class AccountDeleteRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc
 */
class AccountDeleteRequest extends BaseRequest
{
    /**
     * AccountDeleteRequest constructor.
     *
     * @param \BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\Parameters\AccountDeleteItem $accountDeleteItem
     */
    public function __construct(AccountDeleteItem $accountDeleteItem)
    {
        $this->setDeleteItem($accountDeleteItem);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/im_open_login_svc/account_delete';
    }

    /**
     * @param \BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc\Parameters\AccountDeleteItem $parameter
     *
     * @return $this
     */
    public function setDeleteItem(AccountDeleteItem $parameter)
    {
        $this->setParameter('DeleteItem', $parameter->getParameters());

        return $this;
    }
}
