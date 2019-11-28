<?php

namespace BiuBiuJun\QCloud\Tim\Constants;

/**
 * Class PortraitField
 *
 * @package BiuBiuJun\QCloud\TimClient\Constants
 */
class Portrait
{
    /*
     * 字段
     */
    const TAG_NICK = 'Tag_Profile_IM_Nick';// 昵称

    const TAG_GENDER = 'Tag_Profile_IM_Gender';// 性别

    const TAG_BIRTHDAY = 'Tag_Profile_IM_BirthDay';// 生日

    const TAG_LOCATION = 'Tag_Profile_IM_Location';// 所在地

    const TAG_SELF_SIGNATURE = 'Tag_Profile_IM_SelfSignature';// 个性签名

    const TAG_ALLOW_TYPE = 'Tag_Profile_IM_AllowType';// 加好友验证方式

    const TAG_LANGUAGE = 'Tag_Profile_IM_Language';// 语言

    const TAG_IMAGE = 'Tag_Profile_IM_Image';// 头像URL

    const TAG_MSG_SETTINGS = 'Tag_Profile_IM_MsgSettings';// 消息设置

    const TAG_ADMIN_FORBID_TYPE = 'Tag_Profile_IM_AdminForbidType';// 非管理员禁止加好友标识

    const TAG_LEVEL = 'Tag_Profile_IM_Level';// 等级

    const TAG_ROLE = 'Tag_Profile_IM_Role';// 角色

    /*
     * 性别取值
     */
    const GENDER_TYPE_UNKNOWN = 'Gender_Type_Unknown';// 没设置性别

    const GENDER_TYPE_FEMALE = 'Gender_Type_Female';// 女性

    const GENDER_TYPE_MALE = 'Gender_Type_Male';// 男性

    /*
     * 加好友验证方式取值
     */
    const ALLOW_TYPE_TYPE_NEED_CONFIRM = 'AllowType_Type_NeedConfirm';// 需要经过自己确认才能添加自己为好友

    const ALLOW_TYPE_TYPE_NEED_ALLOW_ANY = 'AllowType_Type_AllowAny';// 允许任何人添加自己为好友

    const ALLOW_TYPE_TYPE_NEED_DENY_ANY = 'AllowType_Type_DenyAny';// 不允许任何人添加自己为好友

    /*
     * 管理员禁止加好友标识取值
     */
    const ADMIN_FORBID_TYPE_NONE = 'AdminForbid_Type_None';// 默认值，允许加好友

    const ADMIN_FORBID_TYPE_SEND_OUT = 'AdminForbid_Type_SendOut';// 禁止该用户发起加好友请求
}
