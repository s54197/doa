<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perawis extends Model
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
        return $this->belongsToMany(BorangA::class, 'borang_perawiss');//,'perawis_id','borang_a_s_id');
    }

    
    protected $fillable = [
        'perawis_nama',
        'perawis_nama_kimia',
        'perawis_sinonim',
        'perawis_cas',
        'perawis_hscode',
        'perawis_ahtncode',
        'perawis_piawaian',
        'perawis_sampel',
        'perawis_pihak_ketiga',
        'perawis_kumpulan_kimia',
        'perawis_kaedah',
        'perawis_tarikh_lulus',
        'perawis_tarikh_terhad',
        'perawis_tarikh_haram',
        'perawis_peratusan',
        'perawis_unit',
        'perawis_unit_lain',
        'perawis_status',
    ];

}
