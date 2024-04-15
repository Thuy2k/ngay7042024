<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Page extends Model
{
    //
    use SoftDeletes;
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = [
        'title', 'content'
    ];
}
