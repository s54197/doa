<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorangPerawisPerawis extends Model
{
    use HasFactory;

    protected $table = 'borang_perawis_perawis';
    protected $fillable = ['borang_perawis_id','perawis_id'];
    public $timestamps = false;
}
