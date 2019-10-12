<?php

namespace BiuBiuJun\QCloud\TIM\Requests\OpenIm\Parameters\MsgElements;

/**
 * Class VideoFile
 *
 * @package BiuBiuJun\QCloud\TIM\Parameters\MsgElements
 */
class VideoFile extends MsgElement
{
    /**
     * VideoFile constructor.
     *
     * @param string $videoUrl
     * @param int    $videoSize
     * @param int    $videoSecond
     * @param string $videoFormat
     * @param int    $videoDownloadFlag
     * @param string $thumbUrl
     * @param int    $thumbSize
     * @param int    $thumbWidth
     * @param int    $thumbHeight
     * @param string $thumbFormat
     * @param int    $thumbDownloadFlag
     */
    public function __construct(
        string $videoUrl,
        int $videoSize,
        int $videoSecond,
        string $videoFormat,
        int $videoDownloadFlag,
        string $thumbUrl,
        int $thumbSize,
        int $thumbWidth,
        int $thumbHeight,
        string $thumbFormat,
        int $thumbDownloadFlag
    ) {
        $this->setMsgContent([
            'VideoUrl' => $videoUrl,
            'VideoSize' => $videoSize,
            'VideoSecond' => $videoSecond,
            'VideoFormat' => $videoFormat,
            'VideoDownloadFlag' => $videoDownloadFlag,
            'ThumbUrl' => $thumbUrl,
            'ThumbSize' => $thumbSize,
            'ThumbWidth' => $thumbWidth,
            'ThumbHeight' => $thumbHeight,
            'ThumbFormat' => $thumbFormat,
            'ThumbDownloadFlag' => $thumbDownloadFlag,
        ]);
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return 'TIMVideoFileElem';
    }
}
