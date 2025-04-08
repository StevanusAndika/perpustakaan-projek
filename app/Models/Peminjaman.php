<?php

// app/Models/Peminjaman.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
        'user_id', 'tanggal_pinjam', 'tanggal_kembali', 'status', 'acc_perpanjangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
