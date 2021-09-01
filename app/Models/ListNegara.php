<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListNegara extends Model
{
    use HasFactory;

    protected $fillable = [
        'negara_nama',
    ];
}
