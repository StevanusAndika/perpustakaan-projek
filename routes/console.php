<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

// Command untuk menampilkan quote inspiratif
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Command untuk menghancurkan session
Artisan::command('session:destroy', function () {
    Session::flush();
    $this->info('Session telah dihancurkan!');
})->purpose('Menghancurkan semua session');

Artisan::command('leak:check', function () {
    // ...
})->purpose('Cek apakah ada data bocor di tabel users');
