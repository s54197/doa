<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorangGudangGudang extends Model
{
    use HasFactory;

    protected $table = 'borang_gudang_gudangs';
    protected $fillable = ['borang_gudang_id','gudang_id'];
    public $timestamps = false;
}
