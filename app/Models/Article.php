<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Article extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'article_tbl';
    protected $primaryKey = 'article_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'article_id',
        'user_id',
        'genre_id',
        'demand_cha_id',
        'demand_cha_word',
        'give_cha_id',
        'give_cha_word',
        'deal_way_id',
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

    public function registerData($data){
        $date = date('Y-m-d H:i:s');
        DB::table($this->table)->insert([
            'user_id' => $data->user_id,
            'status' => 1,
            'set_date' => $date,
            'set_nm' => 'system',
            'create_date' => $date,
        ]);
    }
}
