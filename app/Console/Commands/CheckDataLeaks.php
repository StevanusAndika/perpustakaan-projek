<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CheckDataLeaks extends Command
{
    protected $signature = 'data:check-leaks';
    protected $description = 'Cek apakah ada data yang bocor atau tidak valid di database';

    public function handle()
    {
        $this->info('Mulai pengecekan data...');

        // 1. Cek kolom wajib yang NULL
        $usersWithNullEmail = User::whereNull('email')->count();
        if ($usersWithNullEmail > 0) {
            $this->error("Terdapat $usersWithNullEmail user yang tidak memiliki email.");
        } else {
            $this->info('Semua user memiliki email.');
        }

        // 2. Cek format email tidak valid
        $usersInvalidEmail = User::whereNotNull('email')
            ->whereRaw("email NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'")
            ->count();

        if ($usersInvalidEmail > 0) {
            $this->error("Terdapat $usersInvalidEmail user dengan format email tidak valid.");
        } else {
            $this->info('Semua email valid.');
        }

        // 3. Cek duplikat email
        $duplicateEmails = DB::table('users')
            ->select('email', DB::raw('COUNT(*) as jumlah'))
            ->whereNotNull('email')
            ->groupBy('email')
            ->having('jumlah', '>', 1)
            ->get();

        if ($duplicateEmails->count() > 0) {
            $this->error("Terdapat email yang duplikat:");
            foreach ($duplicateEmails as $dup) {
                $this->line("- {$dup->email} (dipakai {$dup->jumlah} kali)");
            }
        } else {
            $this->info('Tidak ada email yang duplikat.');
        }

        $this->info('Pengecekan selesai.');
    }
}
// This command can be run using the following command in the terminal: