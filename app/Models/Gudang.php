<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gudang extends Model
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
        return $this->belongsToMany(BorangA::class, 'borang_gudangs');//,'gudang_id','borang_a_s_id');
    }

    protected $fillable = [
        'gudang_nama',
        'gudang_no_roc',
        'gudang_bangunan',
        'gudang_jalan',
        'gudang_poskod',
        'gudang_bandar',
        'gudang_negeri',
        'gudang_negeri_luar_malaysia',
        'gudang_negara',
        'gudang_no_tel',
        'gudang_no_faks',
        'gudang_emel',
        'gudang_status',
    ];
}
