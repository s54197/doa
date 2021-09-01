<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembekal extends Model
{
    use HasFactory;
    use SoftDeletes;

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'pembekal_nama',
        'pembekal_no_roc',
        'pembekal_bangunan',
        'pembekal_jalan',
        'pembekal_poskod',
        'pembekal_bandar',
        'pembekal_negeri',
        'pembekal_negeri_luar_malaysia',
        'pembekal_negara',
        'pembekal_no_tel',
        'pembekal_no_faks',
        'pembekal_emel',
        'pembekal_status',
    ];
}
