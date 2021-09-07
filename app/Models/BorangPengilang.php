<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorangPengilang extends Model
{
    use HasFactory;

    protected $table = 'borang_pengilangs';
    protected $fillable = ['pengilang_pembekal_id','pengilang_id'];
    public $timestamps = false;
}
