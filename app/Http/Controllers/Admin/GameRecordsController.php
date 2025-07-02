<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameRecord;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GameRecordsController extends AdminBaseController
{
    protected $create_field = ['billno','api_name','name','betAmount','validBetAmount','netAmount','gameType','flag','betTime'];
    protected $update_field = ['billno','api_name','name','betAmount','validBetAmount','netAmount','gameType','flag','betTime'];

    public function __construct(GameRecord $model){
        $this->model = $model;
        parent::__construct();
    }

    /*
    public function index(Request $request)
    {
        $params = $request->all();
        $data = $this->model
            ->where($this->convertWhere($params))
            ->latest()
            ->paginate(5);
        return view("{$this->view_folder}.index", compact('data', 'params'));
    }
    */

    public function index(Request $request)
    {

        $params = $request->all();
        $data = [];
        $total_betAmount = $total_validBetAmount = $total_netAmount = 0;

        if(!$request->get('member_lang'))
            return view("{$this->view_folder}.index", compact('data', 'params','total_betAmount','total_validBetAmount','total_netAmount'));

        $mod = $this->model->where($this->convertWhere($params))
            ->memberLang(isset_and_not_empty($params,'member_lang',''));

        $total_betAmount = sprintf("%.2f",$mod->sum('betAmount'));
        $total_validBetAmount = sprintf("%.2f",$mod->sum('validBetAmount'));
        // $total_netAmount = sprintf("%.2f",$mod->where('status',GameRecord::STATUS_COMPLETE)->sum('netAmount') - $total_betAmount);
        $total_netAmount = sprintf("%.2f",$this->model->where($this->convertWhere($params))->where('status',GameRecord::STATUS_COMPLETE)->select(\DB::raw('sum(netAmount) as res'))->first()->res ?? 0);

        $data = $mod->latest()->paginate(15);
        return view("{$this->view_folder}.index", compact('data', 'params','total_betAmount','total_validBetAmount','total_netAmount'));
    }
}
