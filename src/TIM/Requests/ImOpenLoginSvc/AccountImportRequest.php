<?php

namespace BiuBiuJun\QCloud\TIM\Requests\ImOpenLoginSvc;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class AccountImportRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Requests\ImOpenLoginSvc
 */
class AccountImportRequest extends BaseRequest
{
    /**
     * AccountImportRequest constructor.
     *
     * @param string $identifier
     * @param string $nick
     * @param string $faceUrl
     * @param int    $type
     */
    public function __construct(string $identifier, string $nick = '', string $faceUrl = '', int $type = 0)
    {
        $this->setIdentifier($identifier)
            ->setNick($nick)
            ->setFaceUrl($faceUrl)
            ->setType($type);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/im_open_login_svc/account_import';
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

    /**
     * @param string $nick
     *
     * @return $this
     */
    public function setNick(string $nick)
    {
        $this->setParameter('Nick', $nick);

        return $this;
    }

    /**
     * @param string $faceUrl
     *
     * @return $this
     */
    public function setFaceUrl(string $faceUrl)
    {
        $this->setParameter('FaceUrl', $faceUrl);

        return $this;
    }

    /**
     * @param int $type
     *
     * @return $this
     */
    public function setType(int $type)
    {
        $this->setParameter('Type', $type);

        return $this;
    }
}
