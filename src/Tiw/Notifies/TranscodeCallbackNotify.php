<?php

namespace BiuBiuJun\QCloud\Tiw\Notifies;

use Closure;

/**
 * Class TranscodeCallbackNotify
 *
 * @package BiuBiuJun\QCloud\Tiw\Notifies
 */
class TranscodeCallbackNotify extends BaseNotify
{
    /**
     * @param \Closure $closure
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function handle(Closure $closure)
    {
        $this->strict(
            \call_user_func($closure, $this->getMessage(), [$this, 'fail'])
        );

        return $this->toResponse();
    }
}
