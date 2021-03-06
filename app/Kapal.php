<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    protected $table = 'kapal';
    protected $fillable = ['jenis', 'slug'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kapal_id');
    }
}
