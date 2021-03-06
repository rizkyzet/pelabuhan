<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dermaga extends Model
{
    protected $table = 'dermaga';
    protected $fillable = ['nama', 'slug'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'dermaga_id');
    }
}
