<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'password',
        'mail',
        'nickname',
        'pro_img',
        'avail_flg',
        'set_date',
        'set_nm',
        'create_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'mail',
    ];

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }

    public function getUserFlg($user_id)
    {
        $user_flg = false;
        if(!empty($user_id)){
            $user = DB::table($this->table)->where('user_id', $user_id)->first();
            if(!empty($user)){
                $user_flg = true;
            }
        }

        return $user_flg;
    }
}
