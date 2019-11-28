<?php

namespace BiuBiuJun\QCloud;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;

/**
 * Class QCloud
 *
 * @package BiuBiuJun\QCloud
 * @method  \BiuBiuJun\QCloud\Tim\TimClient Tim($SDKAppID, $identifier, $privateKey, $publicKey, $sigVersion = 'TLSSigAPIv1Api')
 * @method  \BiuBiuJun\QCloud\Tic\TicClient Tic($SDKAppID, $privateKey, $publicKey, $TICKey, $expires = 86400, $sigVersion = 'TLSSigAPIv1Api')
 * @method  \BiuBiuJun\QCloud\Vod\VodClient Vod(string $secretId, string $secretKey)
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
        $application = "\\BiuBiuJun\\QCloud\\{$class}\\{$class}Client";
        if (!class_exists($application)) {
            throw new InvalidArgumentException("QCloud Class {$class} not exist.");
        }

        return new $application(...$arguments);
    }
}
