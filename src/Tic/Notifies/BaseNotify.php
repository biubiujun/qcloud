<?php

namespace BiuBiuJun\QCloud\Tic\Notifies;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use BiuBiuJun\QCloud\Exceptions\InvalidSignException;
use BiuBiuJun\QCloud\Kernel\Sign\TicSign;
use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BaseNotify
 *
 * @package BiuBiuJun\QCloud\Tic\Notifies
 */
abstract class BaseNotify
{
    const SUCCESS = 0;

    const FAIL = -1;

    /**
     * @var \BiuBiuJun\QCloud\Kernel\Sign\TicSign
     */
    protected $TicSign;

    /**
     * @var int
     */
    protected $errorCode;

    /**
     * @var array
     */
    protected $message;

    public function __construct(TicSign $TicSign)
    {
        $this->TicSign = $TicSign;
        $this->errorCode = static::SUCCESS;
    }

    /**
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidSignException
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

        $request = Request::createFromGlobals();
        $message = json_decode($request->getContent(), true);

        if (!is_array($message) || empty($message)) {
            throw new InvalidArgumentException('Invalid request JSON.', 400);
        }

        $this->validate($request);

        return $this->message = $message;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidSignException
     */
    protected function validate(Request $request)
    {
        if (!$this->TicSign->verify($request->get('sign'), $request->get('expire_time'))) {
            throw new InvalidSignException();
        }
    }

    /**
     * @param mixed $result
     */
    protected function strict($result)
    {
        if (true !== $result && empty($this->errorCode)) {
            $this->fail();
        }
    }
}
