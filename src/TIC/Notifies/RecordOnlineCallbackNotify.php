<?php

namespace BiuBiuJun\QCloud\TIC\Notifies;

use Closure;

/**
 * Class RecordOnlineCallbackNotify
 *
 * @package BiuBiuJun\QCloud\TIC\Notifies
 */
class RecordOnlineCallbackNotify extends BaseNotify
{
    /**
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidSignException
     */
    public function handle(Closure $closure)
    {
        $this->strict(
            \call_user_func($closure, $this->getMessage(), [$this, 'fail'])
        );

        return $this->toResponse();
    }
}
