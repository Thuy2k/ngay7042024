<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class ConfigSub extends Model
{
    //
    use SoftDeletes;
    use HasFactory;
    protected $table = 'config_sub';
    protected $fillable = [
        'key_db', 'value_db'
    ];
}
