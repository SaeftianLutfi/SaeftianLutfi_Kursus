<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 't_jurusan';
    protected $primaryKey = 'kd_jurusan';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [ 
        'nm_jurusan', 
        'durasi', 
        'biaya'
    ];


    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'kd_jurusan', 'kd_jurusan');
    }
}
