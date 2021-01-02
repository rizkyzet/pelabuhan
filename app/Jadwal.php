<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['order_id', 'user_id', 'dermaga_id', 'kapal_id', 'waktu_mulai', 'waktu_selesai', 'jumlah_muatan', 'harga', 'bank', 'va_number', 'pdf', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dermaga()
    {
        return $this->belongsTo(Dermaga::class, 'dermaga_id');
    }
    public function kapal()
    {
        return $this->belongsTo(Kapal::class, 'kapal_id');
    }
}
