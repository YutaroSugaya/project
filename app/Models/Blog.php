<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blogs';

    protected $fillable =
    [
        'image',
        'productName',
        'price',
        'stock',
        'company',
        'content'
    ];
}
