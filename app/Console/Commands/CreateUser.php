<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating User';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $userName = $this->argument('name');
        $userEmail = $this->argument('email');
        $userPassword = Hash::make($this->argument('password'));

        $isCreated = User::query()->create([
            'name' => $userName,
            'email' => $userEmail,
            'password' => $userPassword
        ]);

        echo $isCreated ? 'user created' : 'error';
    }
}
