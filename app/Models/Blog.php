<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; //追記

//main 1
class Blog extends Model
{

    use Sortable; //追記

    protected $table = 'blogs';

    protected $fillable = [
        'image',
        'productName',
        'price',
        'stock',
        'content',
        'companie_id'
    ];
    public $sortable = [
        'id',
        'productName',
        'price',
        'stock',
        'content'
    ]; //追記(ソートに使うカラムを指定

    // public function companie()
    // {
    //     return $this->hasMany(Companie::class);
    // }

    public function companie(){
        return $this->belongsTo(Companie::class);
    }



}

?>
