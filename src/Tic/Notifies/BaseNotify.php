<?php

namespace BiuBiuJun\QCloud\Tic\Notifies;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Exceptions\InvalidSignException;
use BiuBiuJun\QCloud\Kernel\TICSign;
use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseNotify
{
    const SUCCESS = 0;

    const FAIL = -1;

    /**
     * @var \BiuBiuJun\QCloud\Kernel\TICSign
     */
    protected $TICSign;

    /**
     * @var int
     */
    protected $errorCode;

    /**
     * @var array
     */
    protected $message;

    public function __construct(TICSign $TICSign)
    {
        $this->TICSign = $TICSign;
        $this->errorCode = static::SUCCESS;
    }

    /**
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    abstract public function handle(Closure $closure);

    public function fail()
    {
        $this->errorCode = static::FAIL;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse()
    {
        $response = json_encode([
            'error_code' => $this->errorCode,
        ]);

        return new Response($response);
    }

    /**
     * @return array
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidSignException
     */
    public function getMessage()
    {
        if (!empty($this->message)) {
            return $this->message;
        }

        $message = json_decode(Request::createFromGlobals()->getContent(), true);

        if (!is_array($message) || empty($message)) {
            throw new InvalidArgumentException('Invalid request JSON.', 400);
        }

        $this->validate($message);

        return $this->message = $message;
    }

    /**
     * @param array $message
     *
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidSignException
     */
    protected function validate(array $message)
    {
        if (!$this->TICSign->validate($message['sign'], $message['expire_time'])) {
            throw new InvalidSignException();
        }
    }

    /**
     * @param mixed $result
     */
    protected function strict($result)
    {
        if (true !== $result && is_null($this->errorCode)) {
            $this->fail();
        }
    }
}
