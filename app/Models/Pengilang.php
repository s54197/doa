<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengilang extends Model
{
    use HasFactory;
    use SoftDeletes;

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'pengilang_nama',
        'pengilang_no_roc',
        'pengilang_bangunan',
        'pengilang_jalan',
        'pengilang_poskod',
        'pengilang_bandar',
        'pengilang_negeri',
        'pengilang_negeri_luar_malaysia',
        'pengilang_negara',
        'pengilang_no_tel',
        'pengilang_no_faks',
        'pengilang_emel',
        'pengilang_status'
    ];
}
