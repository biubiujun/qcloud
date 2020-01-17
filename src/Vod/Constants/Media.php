<?php

namespace BiuBiuJun\QCloud\Vod\Constants;

/**
 * Class Media
 *
 * @package BiuBiuJun\QCloud\Vod\Constants
 */
class Media
{
    // 轨道类型
    const TRACK_TYPE_VIDEO = 'Video';// 视频轨道

    const TRACK_TYPE_AUDIO = 'Audio';// 音频轨道

    const TRACK_TYPE_STICKER = 'Sticker';// 贴图轨道

    // 片段类型
    const TRACK_ITEM_TYPE_VIDEO = 'Video';// 视频片段

    const TRACK_ITEM_TYPE_AUDIO = 'Audio';// 音频片段

    const TRACK_ITEM_TYPE_STICKER = 'Sticker';// 贴图片段

    const TRACK_ITEM_TYPE_TRANSITION = 'Transition';// 转场

    const TRACK_ITEM_TYPE_EMPTY = 'Empty';// 空白片段

    // 任务流状态变更通知模式
    const TASK_NOTIFY_MODE_FINISH = 'Finish';

    const TASK_NOTIFY_MODE_CHANGE = 'Change';

    const TASK_NOTIFY_MODE_NONE = 'None';
}
