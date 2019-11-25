<?php

namespace BiuBiuJun\QCloud\TIC\Requests\Record\Parameters;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MixStreamCustomLayout
 *
 * @package BiuBiuJun\QCloud\TIC\Requests\Record\Parameters
 */
class MixStreamCustomLayout extends BaseParameter
{
    /**
     * MixStreamCustomLayout constructor.
     *
     * @param \BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStreamCustomLayoutCanvas $canvas
     * @param array                                                                        $inputStreamList
     */
    public function __construct(MixStreamCustomLayoutCanvas $canvas, array $inputStreamList)
    {
        $this->setCanvas($canvas)
            ->setInputStreamList($inputStreamList);
    }

    /**
     * @param \BiuBiuJun\QCloud\TIC\Requests\Record\Parameters\MixStreamCustomLayoutCanvas $canvas
     *
     * @return $this
     */
    public function setCanvas(MixStreamCustomLayoutCanvas $canvas)
    {
        $this->setParameter('canvas', $canvas->getParameters());

        return $this;
    }

    /**
     * @param array $inputStreamList
     *
     * @return $this
     */
    public function setInputStreamList(array $inputStreamList)
    {
        $this->setParameter('input_stream_list', $inputStreamList);

        return $this;
    }
}
