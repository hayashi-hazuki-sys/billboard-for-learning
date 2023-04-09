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
            'genre_id' => $data->genre_id,
            'body' => $data->body,
            'status' => 1,
            'set_date' => $date,
            'set_nm' => 'system',
            'create_date' => $date,
        ]);
    }

    public function getArticleList($user_id){
        $article_list = [];
        $column = [
            'article_tbl.article_id',
            'article_tbl.genre_id',
            'article_tbl.demand_cha_id',
            'article_tbl.demand_cha_word',
            'article_tbl.give_cha_id',
            'article_tbl.give_cha_word',
            'article_tbl.deal_way_id',
            'article_tbl.image',
            'article_tbl.body',
            'a.genre_nm',
            'b.chara_nm as demand_cha_nm',
            'c.chara_nm as give_cha_nm',
        ];
        $select_query = DB::table($this->table)
            ->select($column)
            ->addSelect(DB::raw('count(d.reply_id) as reply_cnt'))
            ->leftJoin('genre_tbl as a', 'article_tbl.genre_id', '=', 'a.genre_id')
            ->leftJoin('chara_tbl as b', 'article_tbl.demand_cha_id', '=', 'b.chara_id')
            ->leftJoin('chara_tbl as c', 'article_tbl.give_cha_id', '=', 'c.chara_id')
            ->leftJoin('reply_tbl as d', 'article_tbl.article_id', '=', 'd.article_id')
            ->where('article_tbl.user_id',$user_id)
            ->where('article_tbl.status',1)
            ->where('d.status',1)
        ;

        $article_list = $select_query->get();

        return $article_list;
    }
}
