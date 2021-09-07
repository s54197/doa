<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorangPerawisPengilangPengilang extends Model
{
    use HasFactory;

    protected $table = 'borang_perawis_pengilang_pengilangs';
    protected $fillable = ['borang_pengilang_id','pengilang_id'];
    public $timestamps = false;
}
