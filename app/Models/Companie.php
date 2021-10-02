<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    //テーブル名
    protected $table = 'companies';

    //可変項目
    protected $fillable =
    [
        'company_name',
        'blog_id'

    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

}

?>
