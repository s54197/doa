<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    // Syarikat relationship
    public function syarikats(){
        return $this->hasMany(Syarikat::class);
    }

    // Agen relationship
    public function agens(){
        return $this->hasMany(Agen::class);
    }

    // PihakKetiga relationship
    public function pihakketigas(){
        return $this->hasMany(PihakKetiga::class);
    }

    // Pembekal relationship
    public function pembekals(){
        return $this->hasMany(Pembekal::class);
    }

    // Pengilang relationship
    public function pengilangs(){
        return $this->hasMany(Pengilang::class);
    }

    // Gudang relationship
    public function gudangs(){
        return $this->hasMany(Gudang::class);
    }

    // Penginvoisan relationship
    public function penginvoisans(){
        return $this->hasMany(Penginvoisan::class);
    }

    // Perawis relationship
    public function perawiss(){
        return $this->hasMany(Perawis::class);
    }

    // Produk relationship
    public function produks(){
        return $this->hasMany(Produk::class);
    }

    // BorangA relationship
    public function borangAs(){
        return $this->hasMany(BorangA::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
