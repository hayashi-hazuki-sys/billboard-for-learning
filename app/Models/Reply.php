<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Reply extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'reply_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reply_id',
        'user_id',
        'article_id',
        'image',
        'body',
        'status',
        'set_date',
        'set_nm',
        'create_date',
    ];

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }

    public function getReplyCnt($article_id)
    {
        $query = DB::table($this->table)
            ->select(DB::raw('count(reply_id) as reply_cnt'))
            ->where('article_id',$article_id)
            ->where('status',1)
        ;

        $result = $query->get();

        $reply_cnt = 0;
        if(!empty($result)){
            $reply_cnt = $result->reply_cnt;
        }

        return $reply_cnt;
    }
}
