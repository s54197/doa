<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorangA extends Model
{
    use HasFactory;
    use SoftDeletes;

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function syarikat()
    {
        return $this->belongsTo(Syarikat::class);
    }

    public function getSyarikatsAttribute() {

        $syarikats = collect([]);

        $syarikat = $this->syarikat;
    
        while(!is_null($syarikat)) {
            $syarikats->push($syarikat);
            $syarikat = $syarikat->syarikat;
        }
    
        return $syarikats;
    
    }

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function pihakketigas()
    {
        return $this->belongsToMany(PihakKetiga::class, 'borang_pihak_ketigas');//, 'borang_a_s_id', 'pihak_ketiga_id')->withPivot('borang_a_s_id', 'pihak_ketiga_id');
    }

    public function penginvoisans()
    {
        return $this->belongsToMany(Penginvoisan::class, 'borang_penginvoisans');//, 'borang_a_s_id', 'penginvoisan_id')->as('values');
    }

    public function gudangs()
    {
        return $this->belongsToMany(Gudang::class, 'borang_gudangs');//, 'borang_a_s_id', 'gudang_id')->as('values');
    }

    public function perawiss()
    {
        return $this->belongsToMany(Perawis::class, 'borang_perawis');//, 'borang_a_s_id', 'perawis_id')->as('values');
    }

    public function pengilangs()
    {
        return $this->belongsToMany(PihakKetiga::class, 'borang_pengilangs');//, 'borang_a_s_id', 'pihak_ketiga_id')->as('values');
    }

    public function perawis_pengilangs()
    {
        return $this->belongsToMany(PihakKetiga::class, 'borang_pengilang_perawis');//, 'borang_a_s_id', 'pihak_ketiga_id')->as('values');
    }
    
    
    
    protected $fillable = [
        // 'borangA_syarikat',
        // 'borangA_agen',
        'syarikat_id',
        'agen_id',
        'produk_id',
        'borangA_tarikh_terima_kaunter',
        'borangA_tarikh_lulus',
        'borangA_tarikh_tamat',
        'borangA_wakil_syarikat',
        'borangA_sijil_no_siri',
        'borangA_jenis_pendaftaran',
        'borangA_no_pendaftaran',
        'borangA_perniagaan_mengimport',
        'borangA_perniagaan_mengilang',
        'borangA_perniagaan_lain',
        'borangA_perniagaan_lain_maklumat',
        'borangA_mengilang_merumus',
        'borangA_mengilang_menyedia',
        'borangA_mengilang_mensebati',
        'borangA_mengilang_mencampur',
        'borangA_mengilang_melabel',
        'borangA_mengilang_mempek',
        'borangA_mengilang_membuat',
        'borangA_mengilang_lain',
        'borangA_mengilang_lain_maklumat',
        'borangA_perawis_aktif_1',
        'borangA_perawis_peratusan_1',
        'borangA_perawis_peratusan_unit_1',
        'borangA_perawis_aktif_2',
        'borangA_perawis_peratusan_2',
        'borangA_perawis_peratusan_unit_2',
        'borangA_perawis_aktif_3',
        'borangA_perawis_peratusan_3',
        'borangA_perawis_peratusan_unit_3',
        'borangA_perawis_perumusan',
        'borangA_perawis_perumusan_lain',
        'borangA_surat_no_rujukan_1',
        'borangA_surat_no_rujukan_2',
        'borangA_surat_tarikh',
        'borangA_surat_resit_bayaran',
        'borangA_surat_fail_nama',
        'borangA_surat_fail_src',
        'borangA_sijil_no_siri',
        'borangA_sijil_tarikh',
        'borangA_sijil_fail_nama',
        'borangA_sijil_fail_src',
        'borangA_status',
        'borangA_surat_penama',
        'borangA_surat_slogan_1',
        'borangA_surat_slogan_2',
        'borangA_sijil_pengerusi',
        'borangA_sijil_setiausaha',
    ];

}
