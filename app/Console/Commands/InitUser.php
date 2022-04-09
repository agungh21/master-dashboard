<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class InitUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat user';

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
        $user = User::where('role', 2)->first();

        if (!$user) {
            User::create([
                'name'          => 'Admin',
                'email'         => 'admin@example.com',
                'password'      => Hash::make('rahasia'),
                'role'          => 2,
            ]);
        }
    }
}
