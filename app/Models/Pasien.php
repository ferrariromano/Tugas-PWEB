<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'telepon'];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
