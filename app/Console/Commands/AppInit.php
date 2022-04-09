<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'jalankan semua command yang terdaftar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Create User
        $this->line('Create default users..');
        \Artisan::call('app:init_users');
        $this->info('[v] Success');

        $this->info('## Done ##');
    }
}
