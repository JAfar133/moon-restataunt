<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UpdateUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user-password {email} {new_password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating user password';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $userEmail = $this->argument('email');
        $userNewPassword = Hash::make($this->argument('new_password'));

        $isUpdated = User::query()
            ->where('email', '=', $userEmail)
            ->update(['password' => $userNewPassword]);

        echo $isUpdated ? 'password updated' : 'error';
    }
}
