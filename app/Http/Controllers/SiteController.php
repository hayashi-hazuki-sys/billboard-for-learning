<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\View;

class SiteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user_flg;
    protected $user_id;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //ログイン済みか確認
        $this->user_flg = false;
        //テスト用
        session()->put('user_id', "1");

        $this->user_id = session()->get('user_id');
        if(!empty($this->user_id)){
            //有効状態のユーザか確認
            $user_object = new User();
            $this->user_flg = $user_object->getUserFlg($this->user_id);
        }

        View::composer('*', function($view) {
            $view->with([
                'user_flg'  => $this->user_flg,
                'user_id'   => $this->user_id,
            ]);
        });
    }
}
