<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Creates the one internal admin account used to manage products and
     * portfolio content. CONTENT NEEDED: replace this placeholder password
     * before deploying anywhere reachable — change it immediately via
     * `php artisan tinker` or the (future) profile screen after first login.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@multiandriaindonesia.com'],
            [
                'name' => 'MAI Admin',
                'password' => 'change-this-password',
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
