<?php

namespace BiuBiuJun\QCloud\Tim\Constants;

/**
 * Class Group
 *
 * @package BiuBiuJun\QCloud\Tim\Constants
 */
class Group
{
    /*
     * 群组类型
     */
    const GROUP_TYPE_PUBLIC = 'Public';// 公开群

    const GROUP_TYPE_PRIVATE = 'Private';// 私密群

    const GROUP_TYPE_CHAT_ROOM = 'ChatRoom';// 聊天室

    const GROUP_TYPE_AV_CHAT_ROOM = 'AVChatRoom';// 音视频聊天室

    const GROUP_TYPE_B_CHAT_ROOM = 'BChatRoom';// 在线成员广播大群

    /*
     * 申请加群处理方式
     */
    const APPLY_JOIN_OPTION_FREE_ACCESS = 'FreeAccess';// 自由加入

    const APPLY_JOIN_OPTION_NEED_PERMISSION = 'NeedPermission';// 需要验证 (default)

    const APPLY_JOIN_OPTION_DISABLE_APPLY = 'DisableApply';// 禁止加群

    /*
     * 成员身份
     */
    const ADMIN = 'Admin';// 设置管理员

    const MEMBER = 'Member';// 取消管理员
}
