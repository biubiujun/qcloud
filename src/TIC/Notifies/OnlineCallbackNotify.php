<?php

namespace BiuBiuJun\QCloud\TIC\Notifies;

use Closure;

class OnlineCallbackNotify extends BaseNotify
{
    /**
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function handle(Closure $closure)
    {
        $this->strict(
            \call_user_func($closure, $this->getMessage(), [$this, 'fail'])
        );

        return $this->toResponse();
    }
}
