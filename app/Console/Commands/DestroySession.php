<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class DestroySession extends Command
{
    protected $signature = 'session:destroy';
    protected $description = 'Destroy the current session';

    public function handle()
    {
        // Destroy the session
        Session::flush(); // This will remove all session data
        $this->info('Session destroyed successfully!');
    }
}
