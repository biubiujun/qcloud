<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenConfigSvr;

use BiuBiuJun\QCloud\Kernel\BaseRequest;

/**
 * Class GetAppInfoRequest
 *
 * @package BiuBiuJun\QCloud\TIM\Responses\OpenConfigSvr
 */
class GetAppInfoRequest extends BaseRequest
{
    /**
     * GetAppInfoRequest constructor.
     *
     * @param array $requestField
     */
    public function __construct(array $requestField = [])
    {
        if ($requestField) {
            $this->setRequestField($requestField);
        }
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return 'v4/openconfigsvr/getappinfo';
    }

    /**
     * @param array $requestField
     *
     * @return $this
     */
    public function setRequestField(array $requestField)
    {
        $this->setParameter('RequestField', $requestField);

        return $this;
    }
}
