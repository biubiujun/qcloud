<?php

namespace BiuBiuJun\QCloud\Vod\Requests;

use BiuBiuJun\QCloud\Vod\Requests\Parameters\Canvas;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Output\ComposeMediaOutput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Track\MediaTrack;

/**
 * Class ComposeMediaRequest
 *
 * @package BiuBiuJun\QCloud\Vod\Requests
 */
class ComposeMediaRequest extends BaseVodRequest
{
    /**
     * ComposeMediaRequest constructor.
     *
     * @param array                                                               $tracks
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Output\ComposeMediaOutput $composeMediaOutput
     */
    public function __construct(array $tracks, ComposeMediaOutput $composeMediaOutput)
    {
        $this->setTracks($tracks)
            ->setOutput($composeMediaOutput);
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return 'ComposeMedia';
    }

    /**
     * @param array $tracks
     *
     * @return $this
     */
    public function setTracks(array $tracks)
    {
        $result = [];
        foreach ($tracks as $track) {
            $result[] = $track instanceof MediaTrack ? $track->getParameters() : $track;
        }

        $this->setParameter('Tracks', $result);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\Output\ComposeMediaOutput $composerMediaOutput
     *
     * @return $this
     */
    public function setOutput(ComposeMediaOutput $composerMediaOutput)
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
        $this->setParameter('Canvas', $canvas->getParameters());

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
