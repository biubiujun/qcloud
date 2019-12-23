<?php

namespace BiuBiuJun\QCloud\Tiw\Notifies;

use Closure;

/**
 * Class OnlineRecordCallbackNotify
 *
 * @package BiuBiuJun\QCloud\Tiw\Notifies
 */
class OnlineRecordCallbackNotify extends BaseNotify
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
