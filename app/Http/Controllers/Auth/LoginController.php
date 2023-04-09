<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $message = '';
        if ($request->isMethod('post')) {
            $authinfo =[
                'email'     => $request->email,
                'password' => $request->password
            ];

            //実際の認証ロジック
            if (Auth::attempt($authinfo)){
                //成功時は認証がされているアクションに飛ぶ
                return redirect()->route('site.top');
            } else {
                $message = 'ログインに失敗しました。';
            }
        }
        return view('auth.login',[
            'message' => $message
        ]);
    }
}
