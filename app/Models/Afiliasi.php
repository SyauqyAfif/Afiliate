<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliasi extends Model
{
    use HasFactory;

    protected $table = 'data_afiliasi';

    protected $fillable = [
        'nama_afiliasi',
        'no_telp',
        'alamat',
        'email',
        'tanggal',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
