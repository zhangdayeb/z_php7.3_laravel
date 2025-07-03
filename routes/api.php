<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// 在 routes/api.php 中添加
Route::get('/test-cors', function () {
    return response()->json(['message' => 'CORS is working']);
});

// domain('api.lin-game.com')
Route::namespace("Member")->group(function () {

    // 不需要登录可以访问的页面
    Route::get('games','IndexController@getMainGameList');
    Route::get('games/apis','IndexController@getGameApiList');
    Route::get('games/web','IndexController@getAllApiGames');
    Route::get('games/hotmain','IndexController@getMainPageHotSlotGame');
    Route::get('games/lists','IndexController@getGameLists');
    Route::get('lottery/games','IndexController@getLotteryList');
    Route::get('games/slot/logos','IndexController@getSlotLogoList');
    Route::post('game/type','IndexController@game_type');
    Route::get('banners','IndexController@getBannerListByGroups');
    Route::get('system/notices','IndexController@getSystemNotice');
    Route::get('app/notices','IndexController@getAppNotice');
    Route::get('system/configs','IndexController@getSystemConfig');
    Route::get('system/link','IndexController@getCommonLink');
    Route::get('abouts','IndexController@getAbouts');
    Route::get('about/list','IndexController@getAboutList');
    Route::get('activities','IndexController@getActivityList');
    Route::get('activity/type','IndexController@getActivityType');
    Route::get('activity/{activity}','IndexController@getActivityDetail');

    Route::get('asides/list','IndexController@getAsideList');

    Route::get('lottery/list','IndexController@lotterylist');
    Route::get('lottery/hot','IndexController@lotteryhot');

    Route::get('test','IndexController@test');

    Route::get('act/list','ActivityController@activity_list');
    Route::post('act/apply/{activity}','ActivityController@activity_apply');
    Route::get('act/apply/config','ActivityController@activity_apply_config');
    Route::get('act/apply/result','ActivityController@activity_apply_result');
    Route::get('act/{activity}','ActivityController@activity_detail');

    Route::get('wheel/setting','ActivityController@wheel_setting');
    Route::post('wheel/query','ActivityController@wheel_query');
    Route::post('wheel/award','ActivityController@wheel_award');

    Route::get('credit/rule','ActivityController@credit_rule');
    Route::get('credit/record','ActivityController@credit_record');
    Route::post('credit/borrow','ActivityController@credit_borrow');
    Route::post('credit/lend','ActivityController@credit_lend');
    Route::post('credit/search','ActivityController@credit_search');
    Route::post('credit/check','ActivityController@credit_check');
    /**
    Route::get('levelup/slot/setting','ActivityController@levelup_slot_setting');
    Route::get('levelup/live/setting','ActivityController@levelup_live_setting');

    // Route::get('levelup/search','ActivityController@levelup_search');
    Route::get('levelup/slot/search','ActivityController@levelup_search');
    Route::get('levelup/live/search','ActivityController@levelup_search');
    **/
    // 新增 首页活动
    Route::get('main/advertise','IndexController@vip1_main_advertise');
    Route::get('main/hotgame','IndexController@vip1_main_hotgame');
    Route::get('main/sport','IndexController@vip1_sports');

    Route::get('language','IndexController@vip1_languages');
    Route::get('redbag/desc','MemberController@get_redbag_desc');

    // 用户登录
    Route::prefix("auth")->group(function(){
        Route::post('login', 'AuthController@login');
        Route::post('captcha','AuthController@captcha');
        Route::post('register','AuthController@register');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('reset_pass','AuthController@reset_password');

        Route::post('reg/lang','AuthController@get_register_lang');

        Route::post('app/login', 'AuthController@app_login');
        Route::post('app/register', 'AuthController@app_register');

        Route::post('demo','AuthController@demo');

        // 注册时的短信验证码
        Route::post('sms','AuthController@send_sms');
        Route::post('sms_reset','AuthController@send_sms_for_reset');
        Route::post('sms_bind','AuthController@send_sms_for_bind');

        Route::middleware(['refresh.member'])->group(function () {
            Route::post('logout', 'AuthController@logout');
            Route::post('me', 'AuthController@me');
            Route::post('info/update','AuthController@modify_info');
        });
    });

    // ,'auth:api'
    // 需要登录访问的页面
    Route::middleware(['refresh.member','jwt.auth','auth:api'])->group(function(){
        Route::post('member/password/modify','MemberController@modify_pwd');
        Route::post('member/drawing_pwd/modify','MemberController@modify_qk_pwd');
        Route::post('member/drawing_pwd/set','MemberController@set_qk_pwd');

        Route::post('agent/apply','MemberController@apply_agent');
        Route::post('agent/apply/status','MemberController@apply_agent_status');
        Route::post('recharge/online','MemberController@recharge_online');
        Route::post('recharge/normal','MemberController@recharge');
        Route::post('recharge/picture/upload','MemberController@recharge_payment_pic_upload');

        Route::post('recharge/list','MemberController@recharge_list');

        Route::post('drawing','MemberController@drawing');
        Route::post('drawing/list','MemberController@drawing_list');

        Route::any('moneylog','MemberController@money_log');
        Route::get('moneylog/type','MemberController@money_log_type');

        Route::get('deposit/bank/list','MemberController@deposit_bank_list');
        Route::get('payments/list','MemberController@recharge_payments');
        Route::get('payment/normal/list','MemberController@payment_list');
        Route::get('payment/online/list','MemberController@payment_online');

        Route::get('member/bank/type','MemberController@member_bank_type');
        Route::post('member/bank','MemberController@member_bank_create');
        Route::get('member/bank','MemberController@member_bank_list');
        Route::patch('member/bank/{bank}','MemberController@member_bank_update');
        Route::delete('member/bank/{bank}','MemberController@member_bank_delete');

        Route::get('fs/levels','MemberController@vip1_fs_levels');

        // 站内信相关
        Route::post('member/message/list','MemberController@message_list');
        Route::post('member/message/send_list','MemberController@message_send_list');
        // Route::post('member/message/unread_list','MemberController@message_unread_list');
        Route::post('member/message/send/{message?}','MemberController@message_send');
        // Route::post('member/message/read_list','MemberController@message_read_list');
        //Route::post('member/message/{message}/read','MemberController@message_read');
        //Route::post('member/message/{message}/unread','MemberController@message_unread');

        Route::post('member/message/read','MemberController@message_read_state');
        Route::delete('member/message/delete','MemberController@message_delete');
        Route::delete('member/message/delete_all','MemberController@message_delete_all');
        //Route::delete('member/message/{message}/delete','MemberController@message_delete');

        Route::get('member/agent','MemberController@agent_data');
        Route::get('member/vips','MemberController@vip_info');

        Route::post('game/api_moneys','MemberController@api_moneys');
        Route::post('game/api_money','MemberController@apimoney_single');
        Route::post('game/change_trans','MemberController@change_trans');
        Route::post('game/recovery_last','MemberController@recoveryLast');
        // 游戏相关
        Route::any('game/login','SelfController@login');
        Route::post('game/balance','SelfController@balance');
        Route::post('game/deposit','SelfController@deposit');
        Route::post('game/withdrawal','SelfController@withdrawal');

        Route::post('game/random','SelfController@random_game_record');
        Route::post('game/record','MemberController@game_record');

        // 收藏
        Route::post('favor/add','MemberController@add_favorite');
        Route::post('favor/delete','MemberController@delete_favorite');
        Route::get('favor/list','MemberController@favorite_list');

        // 余额宝相关
        Route::post('yuebao/getMemberYuebaoList',"MemberController@getMemberYuebaoList");
        Route::post('yuebao/getMemberPlans',"MemberController@getMemberPlans");
        Route::post('yuebao/buy',"MemberController@buy_plans");
        Route::post('yuebao/withdrawal',"MemberController@yuebao_drawing");
        Route::post('yuebao/history','MemberController@plans_history');

        Route::post('activity/redbag','MemberController@get_redbag');
        Route::post('redbag/log','MemberController@get_redbag_log');

        Route::post('dailybonus/check','MemberController@daily_bonus_check');
        Route::post('dailybonus/{mod}/award','MemberController@daily_bonus_award');
        Route::get('dailybonus/award/list','MemberController@daili_award_list');
        Route::get('dailybonus/money/history','MemberController@daily_bonus_money_history');
        Route::get('dailybonus/award/history','MemberController@daily_bonus_award_history');
        Route::get('dailybonus/history','MemberController@daily_bonus_history');

        Route::get('fsnow/list','MemberController@fs_now_list');
        Route::post('fsnow/fetch','MemberController@fs_now');

        // 团队功能
        Route::post('team/childlist','TeamController@agentChildList');
        Route::get('team/child/detail','TeamController@teamDetail');

        Route::get('team/fdinfo','TeamController@getAgentFdInfo');
        Route::post('team/add','TeamController@createChildMember');
        Route::post('team/gamerecord','TeamController@getGameRecord');
        Route::post('team/moneylog','TeamController@getMoneyLog');
        Route::post('team/childrates','TeamController@modifyChildRates');
        Route::post('team/report','TeamController@teamReport');
        Route::post('team/chart','TeamController@teamChart');

        Route::get('team/performance','TeamController@performanceQueryTotal');
        Route::get('team/performanceDetail','TeamController@performanceQueryDetail');

        Route::post('team/invite/create','TeamController@agentInviteCreate');
        Route::post('team/invite/update','TeamController@agentInviteUpdate');
        Route::get('team/invite/list','TeamController@agentInviteList');
        Route::any('team/invite/records','TeamController@agentInviteRecords');
    });
});
