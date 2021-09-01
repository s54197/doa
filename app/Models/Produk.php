<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'produk_nama',
        'produk_lrmp_r',
        'produk_lrmp_no',
        'produk_no_fail',
        'produk_tarikh_gazet',
        'produk_tarikh_tamat',
        'produk_tarikh_penwartaan',
        'produk_kelas_racun',
        'produk_saiz',
        'produk_saiz_lain',
        'produk_categori',
        'produk_categori_lain',
        'produk_kegunaan',
        'produk_kegunaan_lain',
        'produk_status',
    ];
}