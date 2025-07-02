<?php

namespace App\Http\Controllers\Member;

use App\Exceptions\InvalidRequestException;
use App\Handlers\FileUploadHandler;
use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\ApiGame;
use App\Models\Bank;
use App\Models\BankCard;
use App\Models\Base;
use App\Models\DailyBonus;
use App\Models\Drawing;
use App\Models\Favorite;
use App\Models\FsLevel;
use App\Models\GameList;
use App\Models\GameRecord;
use App\Models\InterestHistory;
use App\Models\LevelConfig;
use App\Models\Member;
use App\Models\MemberApi;
use App\Models\MemberAgentApply;
use App\Models\MemberBank;
use App\Models\MemberMessage;
use App\Models\MemberMoneyLog;
use App\Models\MemberYuebaoPlan;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Recharge;
use App\Models\SystemConfig;
use App\Models\Transfer;
use App\Models\YuebaoPlan;
use App\Services\ActivityService;
use App\Services\AgentService;
use App\Services\ThirdPayService;
use App\Services\SelfService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
// 游客访问
class SelfController extends MemberBaseController{
    protected $service,$password;
    public function __construct()
    {
        $this->service = new SelfService();
		$this->password = 123456;
    }	
    public function login(Request $request){

		$member = $this->getMember(1);
		if(!$member){
			return $this->failed('请先登陆');
		}
		$member_id = $member->id;
		$member_anme = $member->name;		
		$api_code = strtoupper($request->get('api_code'));
		$isMobile = $request->get('isMobile',0);  //0电脑 ， 1手机
		$gameType = $request->get('gameType',1); //游戏类型：1真人,2捕鱼,3电子,4彩票,5体育,6棋牌,7电竞
		$gameCode = $request->get('gameCode',0);  //子游戏代码
		$lang = $request->get('lang');  //语言
        $api_code = preg_replace("/\\d+/",'', $api_code);
		if($api_code == 'CQ'){
			$api_code = 'CQ9';
		}

		$MemberApi = MemberApi::where('api_name', $api_code)->where('member_id', $member_id)->first();
		
        if(!$MemberApi){			
			$register = $this->service->register($api_code,$member_anme,$this->password);
			if(!$register){
				return $this->failed('发送网络请求失败01');
			}
			$register = json_decode($register,true);
			if($register['Code'] != 0){
				return $this->failed($register['Message']);
			}
                //创建api账号
            $member_api = MemberApi::create([
                'member_id' => $member_id,
                'api_name' => $api_code,
                'username' => $member_anme,
                'password' => $this->password
            ]);			
		}
		if($member->is_trans_on == 1){
			if($member->fs_money > 0){				
                $member->increment('money', $member->fs_money);
                $member->decrement('fs_money', $member->fs_money);				
			}			
            $money = intval($member->money);
			if($money >= 1){
        	    $request->merge(['api_code' => $api_code,'money' => $money]);
         	    $data = $this->deposit($request);	
        	    $data = json_decode($data->getContent(),1);
        	    if($data['status'] != 'success') return $this->failed($data['message']);	
			}			
		}		
		$login = $this->service->login($api_code,$gameCode,$gameType,$lang,$member_anme,$isMobile);
		if(!$login){
			return $this->failed('发送网络请求失败02');
		}		
		$login = json_decode($login,true);
		if($login['Code'] != 0){
			return $this->failed($login['Message']);
		}		
        return $this->success(['game_url' => $login['Data']['url']]);;
    }

    public function balance(Request $request){

		$member = $this->getMember(1);
		if(!$member){
			return $this->failed('请先登陆');
		}
		$member_id = $member->id;
		$member_anme = $member->name;
        $data = $request->all();
		$api_code = strtoupper($data['api_code']);
		$lang = $data['lang'];  //语言
        $api_code = preg_replace("/\\d+/",'', $api_code);
		if($api_code == 'CQ'){
			$api_code = 'CQ9';
		}		
		$MemberApi = MemberApi::where('api_name', $api_code)->where('member_id', $member_id)->first();
        if(!$MemberApi){			
			$register = $this->service->register($api_code,$member_anme,$this->password);
			if(!$register){
				return $this->failed('发送网络请求失败03');
			}
			$register = json_decode($register,true);
			if($register['Code'] != 0){
				return $this->failed($register['Message']);
			}
                //创建api账号
            $member_api = MemberApi::create([
                'member_id' => $member_id,
                'api_name' => $api_code,
                'username' => $member_anme,
                'password' => $this->password
            ]);			
		}
		$balance = $this->service->balance($api_code,$member_anme);		
		if(!$balance){
			return $this->failed('发送网络请求失败04');
		}		
		$balance = json_decode($balance,true);

		if($balance['Code'] != 0){
			return $this->failed($balance['Message']);
		}		
        return $this->success(['money' => $balance['Data']['balance']]);;
    }


    public function deposit(Request $request){

		$member = $this->getMember(1);
		if(!$member){
			return $this->failed('请先登陆');
		}
		$fp = fopen(base_path()."/lock.txt", "w+");
		if(flock($fp,LOCK_EX|LOCK_NB)){		
			$member_id = $member->id;
			$member_anme = $member->name;
			$data = $request->all();
			$api_code = strtoupper($data['api_code']);
			$lang = $request->input('lang', 'zh-cn');  //语言
			$money = $request->input('money');
			$money_type = $request->input('money_type', 'money');
			$api_code = preg_replace("/\\d+/",'', $api_code);
			if($api_code == 'CQ'){
				$api_code = 'CQ9';
			}		
			if($member->money < $money){
				flock($fp,LOCK_UN);//解锁
				fclose($fp);				
				return $this->failed('余额不足');
			}		
			$MemberApi = MemberApi::where('api_name', $api_code)->where('member_id', $member_id)->first();
			$Api = Api::where('api_name', $api_code)->first();
			if(!$MemberApi){			
				$register = $this->service->register($api_code,$member_anme,$this->password);
				if(!$register){
					flock($fp,LOCK_UN);//解锁
					fclose($fp);					
					return $this->failed('发送网络请求失败05');
				}
				$register = json_decode($register,true);
				if(!is_array($register)){
					flock($fp,LOCK_UN);//解锁
					fclose($fp);					
					return $this->failed('未知错误,请联系客服');					
				}				
				if($register['Code'] != 0){
					flock($fp,LOCK_UN);//解锁
					fclose($fp);					
					return $this->failed($register['Message']);
				}
					//创建api账号
				$MemberApi = MemberApi::create([
					'member_id' => $member_id,
					'api_name' => $api_code,
					'username' => $member_anme,
					'password' => $this->password
				]);			
			}
			
			$amount = intval($money);
			$transferno = date("YmdHms").rand(000000,999999);//交易编号		
			$deposit = $this->service->deposit($api_code,$member_anme,$amount,$transferno);		
			if(!$deposit){
				flock($fp,LOCK_UN);//解锁
				fclose($fp);				
				return $this->failed('发送网络请求失败06');
			}		
			$deposit = json_decode($deposit,true);
			if(!is_array($deposit)){
				flock($fp,LOCK_UN);//解锁
				fclose($fp);					
				return $this->failed('未知错误,请联系客服');					
			}			
			if($deposit['Code'] != 0){
				flock($fp,LOCK_UN);//解锁
				fclose($fp);				
				return $this->failed($deposit['Message']);
			}
			$MemberApi->update([
				'money' => $amount
			]);
			$Transfer = Transfer::create([
				'bill_no' => $transferno,
				'api_name' => $api_code,
				'member_id' => $member_id,
				'transfer_type' => 1,  //1转入，2转出
				'money' => $amount,  //转换金额
				'diff_money' => 0,  //差价
				'real_money' => $amount,  //实际转换金额
				'before_money' => $member->money,  //转账前余额
				'after_money' => $member->money - $amount,  //转账后余额
				'money_type' => $money_type,
			]);
			MemberMoneyLog::create([
				'member_id' => $member_id,
				'money' => $amount,
				'money_before' => $member->money,
				'money_after' => $member->money - $amount,
				'money_type' => $money_type,
				'number_type' => -1,  //1增加  -1减少
				'operate_type' => MemberMoneyLog::OPERATE_TYPE_GAME_IN_OUT,
				'description' => '转入【'.$Api->api_title.'】游戏【'.$amount.'元】，扣除账户金额',
				'model_name' => \get_class($Transfer),
				'model_id' => $Transfer->id
			]);		
			$member->decrement('money', $amount);
			flock($fp,LOCK_UN);//解锁
			fclose($fp);			
			return $this->success(['money' => $deposit['Data']['deposit']]);
		}else{
			return $this->failed('请勿频繁提交');
		}
    }
	
    public function withdrawal(Request $request){

		$member = $this->getMember(1);
		if(!$member){
			return $this->failed('请先登陆');
		}
		$fp = fopen(base_path()."/lock.txt", "w+");
		if(flock($fp,LOCK_EX|LOCK_NB)){		
			$member_id = $member->id;
			$member_anme = $member->name;
							
			$api_code = strtoupper($request->input('api_code'));
			$lang = $request->input('lang', 'zh-cn');  //语言
			$money = $request->input('money');
			$money_type = $request->input('money_type', 'money');
			$api_code = preg_replace("/\\d+/",'', $api_code);
			if($api_code == 'CQ'){
				$api_code = 'CQ9';
			}		
			$MemberApi = MemberApi::where('api_name', $api_code)->where('member_id', $member_id)->first();
			$Api = Api::where('api_name', $api_code)->first();
			if(!$MemberApi){			
				$register = $this->service->register($api_code,$member_anme,$this->password);
				if(!$register){
					flock($fp,LOCK_UN);//解锁
					fclose($fp);					
					return $this->failed('发送网络请求失败07');
				}
				$register = json_decode($register,true);
				if(!is_array($register)){
					flock($fp,LOCK_UN);//解锁
					fclose($fp);					
					return $this->failed('未知错误,请联系客服');					
				}				
				if($register['Code'] != 0){
					flock($fp,LOCK_UN);//解锁
					fclose($fp);					
					return $this->failed($register['Message']);
				}
					//创建api账号
				$MemberApi = MemberApi::create([
					'member_id' => $member_id,
					'api_name' => $api_code,
					'username' => $member_anme,
					'password' => $this->password
				]);			
			}
			
			$amount = intval($money);
			$transferno = date("YmdHms").rand(000000,999999);//交易编号		
			$withdrawal = $this->service->withdrawal($api_code,$member_anme,$amount,$transferno);		
			if(!$withdrawal){
				flock($fp,LOCK_UN);//解锁
				fclose($fp);				
				return $this->failed('发送网络请求失败08');
			}		
			$withdrawal = json_decode($withdrawal,true);
			if(!is_array($withdrawal)){
				flock($fp,LOCK_UN);//解锁
				fclose($fp);					
				return $this->failed('未知错误,请联系客服');					
			}			
			if($withdrawal['Code'] != 0){
				flock($fp,LOCK_UN);//解锁
				fclose($fp);				
				return $this->failed($withdrawal['Message']);
			}
			$MemberApi->update([
				'money' => 0
			]);
			$Transfer = Transfer::create([
				'bill_no' => $transferno,
				'api_name' => $api_code,
				'member_id' => $member_id,
				'transfer_type' => 2,  //1转入，2转出
				'money' => $amount,  //转换金额
				'diff_money' => 0,  //差价
				'real_money' => $amount,  //实际转换金额
				'before_money' => $member->money,  //转账前余额
				'after_money' => $member->money + $amount,  //转账后余额
				'money_type' => $money_type,
			]);
			MemberMoneyLog::create([
				'member_id' => $member_id,
				'money' => $amount,
				'money_before' => $member->money,
				'money_after' => $member->money + $amount,
				'money_type' => $money_type,
				'number_type' => 1,  //1增加  -1减少
				'operate_type' => MemberMoneyLog::OPERATE_TYPE_GAME_IN_OUT,
				'description' => '转出【'.$Api->api_title.'】游戏【'.$amount.'元】，增加账户金额',
				'model_name' => \get_class($Transfer),
				'model_id' => $Transfer->id
			]);		
			$member->increment('money', $amount);	
			flock($fp,LOCK_UN);//解锁
			fclose($fp);			
			return $this->success(['money' => $withdrawal['Data']['withdrawal']]);
		}else{
			return $this->failed('请勿频繁提交');
		}
    }	

    public function balance_admin(Request $request){

        $name =  $request->input('name');
		$member = Member::where('name', $name)->first();
		
		$member_id = $member->id;
		$member_anme = $member->name;
        $data = $request->all();
		$api_code = strtoupper($data['api_code']);
        $api_code = preg_replace("/\\d+/",'', $api_code);
		if($api_code == 'CQ'){
			$api_code = 'CQ9';
		}		
		$MemberApi = MemberApi::where('api_name', $api_code)->where('member_id', $member_id)->first();
        if(!$MemberApi){			
			$register = $this->service->register($api_code,$member_anme,$this->password);
			if(!$register){
				return $this->failed('发送网络请求失败03');
			}
			$register = json_decode($register,true);
			if($register['Code'] != 0){
				return $this->failed($register['Message']);
			}
                //创建api账号
            $member_api = MemberApi::create([
                'member_id' => $member_id,
                'api_name' => $api_code,
                'username' => $member_anme,
                'password' => $this->password
            ]);			
		}
		$balance = $this->service->balance($api_code,$member_anme);		
		if(!$balance){
			return $this->failed('发送网络请求失败04');
		}		
		$balance = json_decode($balance,true);

		if($balance['Code'] != 0){
			return $this->failed($balance['Message']);
		}		
        return $this->success(['money' => $balance['Data']['balance']]);;
    }
	
    public function withdrawal_admin(Request $request){

        $name =  $request->input('name');
		$member = Member::where('name', $name)->first();

		$member_id = $member->id;
        $member_anme = $member->name;
						
		$api_code = strtoupper($request->input('api_code'));
		$lang = $request->input('lang', 'zh-cn');  //语言
		$money = $request->input('money');
		$money_type = $request->input('money_type', 'money');
        $api_code = preg_replace("/\\d+/",'', $api_code);
		if($api_code == 'CQ'){
			$api_code = 'CQ9';
		}		
		$MemberApi = MemberApi::where('api_name', $api_code)->where('member_id', $member_id)->first();
        $Api = Api::where('api_name', $api_code)->first();
        if(!$MemberApi){			
			$register = $this->service->register($api_code,$member_anme,$this->password);
			if(!$register){
				return $this->failed('发送网络请求失败07');
			}
			$register = json_decode($register,true);
			if($register['Code'] != 0){
				return $this->failed($register['Message']);
			}
                //创建api账号
            $MemberApi = MemberApi::create([
                'member_id' => $member_id,
                'api_name' => $api_code,
                'username' => $member_anme,
                'password' => $this->password
            ]);			
		}
		
        $amount = intval($money);
        $transferno = date("YmdHms").rand(000000,999999);//交易编号		
		$withdrawal = $this->service->withdrawal($api_code,$member_anme,$amount,$transferno);		
		if(!$withdrawal){
			return $this->failed('发送网络请求失败08');
		}		
		$withdrawal = json_decode($withdrawal,true);
		if($withdrawal['Code'] != 0){
			return $this->failed($withdrawal['Message']);
		}
        $MemberApi->update([
            'money' => 0
        ]);
        $Transfer = Transfer::create([
            'bill_no' => $transferno,
            'api_name' => $api_code,
            'member_id' => $member_id,
            'transfer_type' => 2,  //1转入，2转出
			'money' => $amount,  //转换金额
			'diff_money' => 0,  //差价
			'real_money' => $amount,  //实际转换金额
			'before_money' => $member->money,  //转账前余额
			'after_money' => $member->money + $amount,  //转账后余额
			'money_type' => $money_type,
        ]);
        MemberMoneyLog::create([
            'member_id' => $member_id,
            'money' => $amount,
			'money_before' => $member->money,
			'money_after' => $member->money + $amount,
			'money_type' => $money_type,
            'number_type' => 1,  //1增加  -1减少
            'operate_type' => MemberMoneyLog::OPERATE_TYPE_GAME_IN_OUT,
            'description' => '转出【'.$Api->api_title.'】游戏【'.$amount.'元】，增加账户金额',
            'model_name' => \get_class($Transfer),
            'model_id' => $Transfer->id
        ]);		
        $member->increment('money', $amount);		
        return $this->success(['money' => $withdrawal['Data']['withdrawal']]);
    }	
	
}