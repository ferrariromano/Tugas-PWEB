<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'spesialisasi', 'telepon'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }

}
