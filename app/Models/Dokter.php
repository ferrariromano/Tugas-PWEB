<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'nama',
        'spesialisasi_id',
        'jenis_kelamin'
    ];

    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class);
    }

}
