<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nim',
        'no_anggota',
        'alamat',
        'no_telepon',
        'status',
        'google_id',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->no_anggota)) {
                $prefix = $user->role === 'admin' ? 'ADM' : 'USR';
                $user->no_anggota = $prefix . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
            }
        });
    }
}
