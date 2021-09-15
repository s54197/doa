<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PihakKetiga extends Model
{
    use HasFactory;
    use SoftDeletes;

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borangAs()
    {
        return $this->belongsToMany(BorangA::class, 'borang_pihak_ketigas','pihak_ketiga_id','borang_a_s_id')->withPivot('pihak_ketiga_id', 'borang_a_s_id');;
    }

    public function borangAs_pengilang()
    {
        return $this->belongsToMany(BorangA::class, 'borang_pengilangs','pihak_ketiga_id','borang_a_s_id');
    }

    public function borangAs_perawis_pengilang()
    {
        return $this->belongsToMany(BorangA::class, 'borang_perawis_pengilang','pihak_ketiga_id','borang_a_s_id');
    }

    protected $fillable = [
        'pihak_ketiga_nama',
        'pihak_ketiga_no_roc',
        'pihak_ketiga_bangunan',
        'pihak_ketiga_jalan',
        'pihak_ketiga_poskod',
        'pihak_ketiga_bandar',
        'pihak_ketiga_negeri',
        'pihak_ketiga_negeri_luar_malaysia',
        'pihak_ketiga_negara',
        'pihak_ketiga_no_tel',
        'pihak_ketiga_no_faks',
        'pihak_ketiga_emel',
        'pihak_ketiga_status',
        'pihak_ketiga_jenis'
    ];
}
