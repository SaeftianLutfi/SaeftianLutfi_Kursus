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
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nm_peserta',
        'jekel',
        'alamat',
        'no_hp',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_peserta', 'id_peserta');
    }
}
