<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorangPembekal extends Model
{
    use HasFactory;

    protected $table = 'borang_pembekals';
    protected $fillable = ['pengilang_pembekal_id','pembekal_id'];
    public $timestamps = false;
}
