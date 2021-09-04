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

    public function pembekals()
    {
        return $this->belongsToMany(Pembekal::class, 'borang_pembekals');
    }

    public function pengilangs()
    {
        return $this->belongsToMany(Pengilang::class, 'borang_pengilangs');
    }

    public function penginvoisans()
    {
        return $this->belongsToMany(Penginvoisan::class, 'borang_penginvoisans');
    }

    public function perawiss()
    {
        return $this->belongsToMany(Perawis::class, 'borang_perawiss');
    }

    public function gudangs()
    {
        return $this->belongsToMany(Gudang::class, 'borang_gudangs');
    }
    
    protected $fillable = [
        'borangA_syarikat',
        'borangA_agen',
        'borangA_tarikh_terima_kaunter',
        'borangA_tarikh_lulus',
        'borangA_tarikh_tamat',
        'borangA_wakil_syarikat',
        'borangA_jenis_pendaftaran',
        'borangA_dagangan',
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
        'borangA_perniagaan_bangunan',
        'borangA_perniagaan_jalan',
        'borangA_perniagaan_poskod',

        'borangA_mengilang_mempek',
        'borangA_mengilang_membuat',
        'borangA_mengilang_lain',
        'borangA_mengilang_lain_maklumat',
        'borangA_perniagaan_bangunan',
        'borangA_perniagaan_jalan',
        'borangA_perniagaan_poskod',
    ];

}
