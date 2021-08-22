<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syarikat extends Model
{
    use HasFactory;

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'syarikat_nama',
        'syarikat_no_roc',
        'syarikat_tarikh_roc',
        'syarikat_bangunan',
        'syarikat_jalan',
        'syarikat_poskod',
        'syarikat_bandar',
        'syarikat_negeri',
        'syarikat_surat_bangunan',
        'syarikat_surat_jalan',
        'syarikat_surat_poskod',
        'syarikat_surat_bandar',
        'syarikat_surat_negeri',
        'syarikat_no_tel',
        'syarikat_no_faks',
        'syarikat_emel',
        'syarikat_wakil',
        'syarikat_status',
    ];
}
