<?php

namespace BiuBiuJun\QCloud\Tiw\Requests\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class CustomLayout
 *
 * @package BiuBiuJun\QCloud\Tiw\Requests\Parameters
 */
class CustomLayout extends BaseParameter
{
    /**
     * CustomLayout constructor.
     *
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\Canvas $canvas
     * @param array                                            $inputStreamList
     */
    public function __construct(Canvas $canvas, array $inputStreamList)
    {
        $this->setCanvas($canvas)
            ->setInputStreamList($inputStreamList);
    }

    /**
     * @param \BiuBiuJun\QCloud\Tiw\Requests\Parameters\Canvas $canvas
     *
     * @return $this
     */
    public function setCanvas(Canvas $canvas)
    {
        $this->setParameter('Canvas', $canvas->getParameters());

        return $this;
    }

    /**
     * @param array $inputStreamList
     *
     * @return $this
     */
    public function setInputStreamList(array $inputStreamList)
    {
        $this->setParameter('InputStreamList', $inputStreamList);

        return $this;
    }
}
