<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penginvoisan extends Model
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
        return $this->belongsToMany(BorangA::class, 'borang_penginvoisan');
    }

    protected $fillable = [
        'penginvoisan_nama',
        'penginvoisan_no_roc',
        'penginvoisan_bangunan',
        'penginvoisan_jalan',
        'penginvoisan_poskod',
        'penginvoisan_bandar',
        'penginvoisan_negeri',
        'penginvoisan_negeri_luar_malaysia',
        'penginvoisan_negara',
        'penginvoisan_no_tel',
        'penginvoisan_no_faks',
        'penginvoisan_emel',
        'penginvoisan_status',
    ];

}
