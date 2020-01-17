<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Process;

use BiuBiuJun\QCloud\Kernel\BaseParameter;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\AdaptiveDynamicStreamingTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\AnimatedGraphicTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\CoverBySnapshotTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\ImageSpriteTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\SampleSnapshotTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\SnapshotByTimeOffsetTaskInput;
use BiuBiuJun\QCloud\Vod\Requests\Parameters\Process\TaskInput\TranscodeTaskInput;

/**
 * Class MediaProcessTaskInput
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters\Process
 */
class MediaProcessTaskInput extends BaseParameter
{
    /**
     * MediaProcessTaskInput constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param array $transcodeTaskSets
     *
     * @return $this
     */
    public function setTranscodeTaskSet(array $transcodeTaskSets)
    {
        $result = [];
        foreach ($transcodeTaskSets as $transcodeTaskSet) {
            $result[] = $transcodeTaskSet instanceof TranscodeTaskInput ? $transcodeTaskSet->getParameters() : $transcodeTaskSet;
        }

        $this->setParameter('TranscodeTaskSet', $result);

        return $this;
    }

    /**
     * @param array $animatedGraphicTaskSets
     *
     * @return $this
     */
    public function setAnimatedGraphicTaskSet(array $animatedGraphicTaskSets)
    {
        $result = [];
        foreach ($animatedGraphicTaskSets as $animatedGraphicTaskSet) {
            $result[] = $animatedGraphicTaskSet instanceof AnimatedGraphicTaskInput ? $animatedGraphicTaskSet->getParameters() : $animatedGraphicTaskSet;
        }

        $this->setParameter('AnimatedGraphicTaskSet', $result);

        return $this;
    }

    /**
     * @param $snapshotByTimeOffsetTaskSets
     *
     * @return $this
     */
    public function setSnapshotByTimeOffsetTaskSet($snapshotByTimeOffsetTaskSets)
    {
        $result = [];
        foreach ($snapshotByTimeOffsetTaskSets as $snapshotByTimeOffsetTaskSet) {
            $result[] = $snapshotByTimeOffsetTaskSet instanceof SnapshotByTimeOffsetTaskInput ? $snapshotByTimeOffsetTaskSet->getParameters() : $snapshotByTimeOffsetTaskSet;
        }

        $this->setParameter('SnapshotByTimeOffsetTaskSet', $result);

        return $this;
    }

    /**
     * @param $sampleSnapshotTaskSets
     *
     * @return $this
     */
    public function setSampleSnapshotTaskSet($sampleSnapshotTaskSets)
    {
        $result = [];
        foreach ($sampleSnapshotTaskSets as $sampleSnapshotTaskSet) {
            $result[] = $sampleSnapshotTaskSet instanceof SampleSnapshotTaskInput ? $sampleSnapshotTaskSet->getParameters() : $sampleSnapshotTaskSet;
        }

        $this->setParameter('SampleSnapshotTaskSet', $result);

        return $this;
    }

    /**
     * @param $imageSpriteTaskSets
     *
     * @return $this
     */
    public function setImageSpriteTaskSet($imageSpriteTaskSets)
    {
        $result = [];
        foreach ($imageSpriteTaskSets as $imageSpriteTaskSet) {
            $result[] = $imageSpriteTaskSet instanceof ImageSpriteTaskInput ? $imageSpriteTaskSet->getParameters() : $imageSpriteTaskSet;
        }

        $this->setParameter('ImageSpriteTaskSet', $result);

        return $this;
    }

    /**
     * @param $coverBySnapshotTaskSets
     *
     * @return $this
     */
    public function setCoverBySnapshotTaskSet($coverBySnapshotTaskSets)
    {
        $result = [];
        foreach ($coverBySnapshotTaskSets as $coverBySnapshotTaskSet) {
            $result[] = $coverBySnapshotTaskSet instanceof CoverBySnapshotTaskInput ? $coverBySnapshotTaskSet->getParameters() : $coverBySnapshotTaskSet;
        }

        $this->setParameter('CoverBySnapshotTaskSet', $result);

        return $this;
    }

    /**
     * @param $adaptiveDynamicStreamingTaskSets
     *
     * @return $this
     */
    public function setAdaptiveDynamicStreamingTaskSet($adaptiveDynamicStreamingTaskSets)
    {
        $result = [];
        foreach ($adaptiveDynamicStreamingTaskSets as $adaptiveDynamicStreamingTaskSet) {
            $result[] = $adaptiveDynamicStreamingTaskSet instanceof AdaptiveDynamicStreamingTaskInput ? $adaptiveDynamicStreamingTaskSet->getParameters() : $adaptiveDynamicStreamingTaskSet;
        }

        $this->setParameter('AdaptiveDynamicStreamingTaskSet', $result);

        return $this;
    }
}
