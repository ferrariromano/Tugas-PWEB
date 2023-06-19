<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['rekam_medis_id', 'jumlah_bayar', 'metode_pembayaran'];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
