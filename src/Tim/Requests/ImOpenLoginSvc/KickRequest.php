<?php

namespace BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class KickRequest
 *
 * @package BiuBiuJun\QCloud\Tim\Requests\ImOpenLoginSvc
 */
class KickRequest extends BaseRequest
{
    /**
     * KickRequest constructor.
     *
     * @param string $identifier
     */
    public function __construct(string $identifier)
    {
        $this->setIdentifier($identifier);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/im_open_login_svc/kick';
    }

    /**
     * @param string $identifier
     *
     * @return $this
     */
    public function setIdentifier(string $identifier)
    {
        $this->setParameter('Identifier', $identifier);

        return $this;
    }
}
