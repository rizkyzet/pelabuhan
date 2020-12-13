<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['user_id', 'waktu_mulai', 'waktu_selesai', 'harga', 'status'];

    public function user()
    {
        return $this->belongsTo(Jadwal::class, 'user_id');
    }
}
