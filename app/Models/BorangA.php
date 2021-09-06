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

    // $table->string('borangA_syarikat');
    // $table->string('borangA_agen');
    // $table->date('borangA_tarikh_terima_kaunter');
    // $table->date('borangA_tarikh_lulus');
    // $table->date('borangA_tarikh_tamat');
    // $table->string('borangA_wakil_syarikat');
    // $table->string('borangA_jenis_pendaftaran');

    // $table->string('borangA_dagangan');
    // $table->string('borangA_no_pendaftaran');

    // $table->string('borangA_perniagaan_mengimport');
    // $table->string('borangA_perniagaan_mengilang');
    // $table->string('borangA_perniagaan_lain');
    // $table->string('borangA_perniagaan_lain_maklumat');
    // $table->string('borangA_mengilang_merumus');
    // $table->string('borangA_mengilang_menyedia');
    // $table->string('borangA_mengilang_mensebati');
    // $table->string('borangA_mengilang_mencampur');
    // $table->string('borangA_mengilang_melabel');
    // $table->string('borangA_mengilang_mempek');
    // $table->string('borangA_mengilang_membuat');
    // $table->string('borangA_mengilang_lain');
    // $table->string('borangA_mengilang_lain_maklumat');
    // $table->string('borangA_perniagaan_bangunan');
    // $table->string('borangA_perniagaan_jalan');
    // $table->string('borangA_perniagaan_poskod');
    // $table->string('borangA_perniagaan_bandar');
    // $table->string('borangA_perniagaan_negeri');
    // // $table->string('borangA_pengilang');
    // $table->string('borangA_pengilang_kontrak');
    // // $table->string('borangA_penginvoisan');
    // // $table->string('borangA_gudang');

    // // $table->string('borangA_perawis_aktif');
    // $table->string('borangA_perawis_kod');
    // $table->string('borangA_perawis_perumusan');
    // $table->string('borangA_perawis_perumusan_lain');
    // // $table->string('borangA_perawis_pengilang');
    
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
        'borangA_pengilang',
        'borangA_pengilang_kontrak',
        'borangA_penginvoisan',
        'borangA_gudang',
        'borangA_perawis_aktif',
        'borangA_perawis_kod',
        'borangA_perawis_perumusan',
        'borangA_perawis_perumusan_lain',
        'borangA_perawis_pengilang',
        'borangA_status'
    ];

}
