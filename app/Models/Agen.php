<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agen extends Model
{
    use HasFactory;
    use SoftDeletes;

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Agen relationship
    public function borangAs(){
        return $this->hasMany(Agen::class);
    }

    protected $fillable = [
        'agen_nama',
        'agen_ic',
        'agen_syarikat',
        'agen_roc',
        'agen_bangunan',
        'agen_jalan',
        'agen_poskod',
        'agen_bandar',
        'agen_negeri',
        'agen_no_tel',
        'agen_no_faks',
        'agen_emel',
        'agen_status',
        'agen_negara'
    ];
}
