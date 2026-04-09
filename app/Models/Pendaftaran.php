<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 't_pendaftaran';
    protected $primaryKey = 'id_daftar';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_peserta',
        'kd_jurusan',
        'tgl_daftar',
        'status'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'id_peserta');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kd_jurusan', 'kd_jurusan');
    }
}
