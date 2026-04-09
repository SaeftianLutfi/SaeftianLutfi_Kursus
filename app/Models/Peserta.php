<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 't_peserta';
    protected $primaryKey = 'id_peserta';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'kd_jurusan',
        'nm_peserta',
        'jekel',
        'alamat',
        'no_hp',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kd_jurusan', 'kd_jurusan');
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_peserta', 'id_peserta');
    }
}
