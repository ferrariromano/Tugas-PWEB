<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = ['rekam_medis_id', 'obat_id', 'jumlah'];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function rekam_medis()
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
