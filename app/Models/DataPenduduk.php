<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;
    protected $table = 'data_penduduk';
    protected $fillable = [
        'kk',
        'nik',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'status'
    ];
}
