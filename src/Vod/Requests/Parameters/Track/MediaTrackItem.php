<?php

namespace BiuBiuJun\QCloud\Vod\Requests\Parameters\Track;

use BiuBiuJun\QCloud\Kernel\BaseParameter;

/**
 * Class MediaTrackItem
 *
 * @package BiuBiuJun\QCloud\Vod\Requests\Parameters
 */
class MediaTrackItem extends BaseParameter
{
    /**
     * MediaTrackItem constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->setType($type);
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->setParameter('Type', $type);

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\VideoTrackItem $videoTrackItem
     *
     * @return $this
     */
    public function setVideoItem(VideoTrackItem $videoTrackItem)
    {
        $this->setParameter('VideoItem', $videoTrackItem->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\AudioTrackItem $audioTrackItem
     *
     * @return $this
     */
    public function setAudioItem(AudioTrackItem $audioTrackItem)
    {
        $this->setParameter('AudioItem', $audioTrackItem->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\StickerTrackItem $stickerTrackItem
     *
     * @return $this
     */
    public function setStickerItem(StickerTrackItem $stickerTrackItem)
    {
        $this->setParameter('StickerItem', $stickerTrackItem->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\MediaTransitionItem $mediaTransitionItem
     *
     * @return $this
     */
    public function setTransitionItem(MediaTransitionItem $mediaTransitionItem)
    {
        $this->setParameter('TransitionItem', $mediaTransitionItem->getParameters());

        return $this;
    }

    /**
     * @param \BiuBiuJun\QCloud\Vod\Requests\Parameters\EmptyTrackItem $emptyTrackItem
     *
     * @return $this
     */
    public function setEmptyItem(EmptyTrackItem $emptyTrackItem)
    {
        $this->setParameter('EmptyItem', $emptyTrackItem->getParameters());

        return $this;
    }
}
