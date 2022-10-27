<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'data_program';

    protected $fillable = [
        'nama_program',
        'jp',
        'created_at',
        'updated_at',
    ];

    public function jp(){
        return $this->belongsTO('App\Models\jp', 'jp');
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
