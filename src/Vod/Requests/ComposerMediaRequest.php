<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

use BiuBiuJun\QCloud\Kernel\BaseRequest;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Canvas;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Output\ComposerMediaOutput;

/**
 * Class ComposerMediaRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class ComposerMediaRequest extends BaseRequest
{
    /**
     * ComposerMediaRequest constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'ConfirmEvents';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '2018-07-17';
    }

    /**
     * @param array $tracks
     *
     * @return $this
     */
    public function setTracks(array $tracks)
    {
        $this->setParameter('Tracks', $tracks);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Output\ComposerMediaOutput $composerMediaOutput
     *
     * @return $this
     */
    public function setOutput(ComposerMediaOutput $composerMediaOutput)
    {
        $this->setParameter('Output', $composerMediaOutput->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Canvas $canvas
     *
     * @return $this
     */
    public function setCanvas(Canvas $canvas)
    {
        $this->setParameter('Canvas', $canvas);

        return $this;
    }

    /**
     * @param int $subAppId
     *
     * @return $this
     */
    public function setSubAppId(int $subAppId)
    {
        $this->setParameter('SubAppId', $subAppId);

        return $this;
    }
}
