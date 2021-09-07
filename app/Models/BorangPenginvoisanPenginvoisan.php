<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorangPenginvoisanPenginvoisan extends Model
{
    use HasFactory;

    protected $table = 'borang_penginvoisan_penginvoisans';
    protected $fillable = ['borang_penginvoisan_id','penginvoisan_id'];
    public $timestamps = false;
}
