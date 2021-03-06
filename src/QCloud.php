<?php

namespace BiuBiuJun\QCloud;

use BiuBiuJun\QCloud\Exceptions\InvalidArgumentException;

/**
 * Class QCloud
 *
 * @package BiuBiuJun\QCloud
 * @method  \BiuBiuJun\QCloud\Tim\TimClient tim(string $sdkAppId, string $identifier)
 * @method  \BiuBiuJun\QCloud\Tiw\TiwClient tiw(string $secretId, string $secretKey, string $sdkAppId = '')
 * @method  \BiuBiuJun\QCloud\Trtc\TrtcClient trtc(string $secretId, string $secretKey)
 * @method  \BiuBiuJun\QCloud\Vod\VodClient vod(string $secretId, string $secretKey)
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
