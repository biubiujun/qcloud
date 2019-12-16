<?php

namespace BiuBiuJun\QCloud\Kernel\Sign;

use BiuBiuJun\QCloud\Exceptions\InvalidConfigException;

/**
 * Trait TlsSignKey
 *
 * @package BiuBiuJun\QCloud\Kernel\Sign
 */
trait TlsSignKey
{
    /**
     * @var string|bool
     */
    protected $privateKey = false;

    /**
     * @var bool
     */
    protected $isSetPrivateKey = false;

    /**
     * @var string|bool
     */
    protected $publicKey = false;

    /**
     * @var bool
     */
    protected $isSetPublicKey = false;

    /**
     * @return bool
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     */
    public function setPrivateKey()
    {
        if (false === $this->isSetPrivateKey) {
            if (is_file($this->privateKey)) {
                $privateKey = "file://{$this->privateKey}";
            } else {
                $key = wordwrap($this->privateKey, 64, "\n", true);
                $privateKey = "-----BEGIN PRIVATE KEY-----\n{$key}\n-----END PRIVATE KEY-----";
            }

            $this->privateKey = openssl_pkey_get_private($privateKey);
            if (false === $this->privateKey) {
                throw new InvalidConfigException(openssl_error_string());
            }
            $this->isSetPrivateKey = true;
        }

        return true;
    }

    /**
     * @return bool
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidConfigException
     */
    public function setPublicKey()
    {
        if (false === $this->isSetPublicKey) {
            if (is_file($this->publicKey)) {
                $publicKey = "file://{$this->publicKey}";
            } else {
                $key = wordwrap($this->privateKey, 64, "\n", true);
                $publicKey = "-----BEGIN PUBLIC KEY-----\n{$key}\n-----END PUBLIC KEY-----";
            }

            $this->publicKey = openssl_pkey_get_public($publicKey);
            if (false === $this->publicKey) {
                throw new InvalidConfigException(openssl_error_string());
            }
            $this->isSetPublicKey = true;
        }

        return true;
    }
}
