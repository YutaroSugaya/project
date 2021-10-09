<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    //テーブル名
    protected $table = 'companies';


    //可変項目 =データベースに保存していいものを入れる
    protected $fillable =
    [
        'company_name',
    ];

    // public function blog(){
    //     return $this->belongsTo(Blog::class);
    // }

    public function blogs()
    {
        return $this->hasMany(Blog::class)->where('companie_id',0)->orderBy('id', 'DESC');
    }

}

?>
