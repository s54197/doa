<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agen extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    ];
}
