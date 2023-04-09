<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Genre extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'genre_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'genre_id',
        'genre_nm',
        'genre_kana',
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
}
