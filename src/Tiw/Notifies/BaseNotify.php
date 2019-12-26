<?php

namespace BiuBiuJun\QCloud\Tiw\Notifies;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;
use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BaseNotify
 *
 * @package BiuBiuJun\QCloud\Tiw\Notifies
 */
abstract class BaseNotify
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var array
     */
    protected $message;

    /**
     * BaseNotify constructor.
     */
    public function __construct()
    {
        $this->statusCode = Response::HTTP_OK;
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
        $this->statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse()
    {
        return new Response('', $this->statusCode);
    }

    /**
     * @return array|mixed
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
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

        return $this->message = $message;
    }

    /**
     * @param mixed $result
     */
    protected function strict($result)
    {
        if (true !== $result && empty($this->statusCode)) {
            $this->fail();
        }
    }
}
