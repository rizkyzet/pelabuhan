<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dermaga extends Model
{
    protected $table = 'dermaga';
    protected $fillable = ['nama', 'slug'];
}
