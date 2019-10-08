<?php

namespace BiuBiuJun\QCloud;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;

/**
 * Class QCloud
 *
 * @package BiuBiuJun\QCloud
 * @method  \BiuBiuJun\QCloud\TIM\TIM TIM($SDKAppID, $identifier, $privateKey, $publicKey, $sigVersion = 'TLSSigAPIv1')
 */
class QCloud
{
    /**
     * @param string $class
     * @param array  $arguments
     *
     * @return mixed
     * @throws \BiuBiuJun\QCloud\Exceptions\InvalidArgumentException
     */
    public function __call($class, $arguments)
    {
        $class = ucfirst($class);
        $application = "\\BiuBiuJun\\QCloud\\{$class}\\{$class}";
        if (!class_exists($application)) {
            throw new InvalidArgumentException("QCloud Class {$class} not exist.");
        }

        return new $application(...$arguments);
    }
}
