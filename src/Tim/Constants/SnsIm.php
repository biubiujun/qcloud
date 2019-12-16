<?php

namespace BiuBiuJun\QCloud\Tim\Constants;

/**
 * Class SnsIm
 *
 * @package BiuBiuJun\QCloud\Tim\Constants
 */
class SnsIm
{
    /*
     * 加好友方式
     */
    const ADD_TYPE_SINGLE = 'Add_Type_Single';// 单向加好友

    const ADD_TYPE_BOTH = 'Add_Type_Both';// 双向加好友

    /*
     * 删好友方式
     */
    const DELETE_TYPE_SINGLE = 'Delete_Type_Single';// 单向删除好友

    const DELETE_TYPE_BOTH = 'Delete_Type_Both';// 双向删除好友

    /*
     * 校验好友
     */
    const CHECK_RESULT_TYPE_SINGLE = 'CheckResult_Type_Single';// 单向校验好友关系

    const CHECK_RESULT_TYPE_BOTH = 'CheckResult_Type_Both';// 双向校验好友关系

    /*
     * 校验黑名单
     */
    const BLACK_CHECK_RESULT_TYPE_SINGLE = 'BlackCheckResult_Type_Single';// 单向校验黑名单关系

    const BLACK_CHECK_RESULT_TYPE_BOTH = 'BlackCheckResult_Type_Both';// 双向校验黑名单关系

    /*
     *
     */
    const TAG_GROUP = 'Tag_SNS_IM_Group';// 好友分组

    const TAG_REMARK = 'Tag_SNS_IM_Remark';// 好友备注

    const TAG_ADD_SOURCE = 'Tag_SNS_IM_AddSource';// 加好友来源

    const TAG_ADD_WORDING = 'Tag_SNS_IM_AddWording';// 加好友附言
}
