<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoginThrottleTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_is_locked_after_five_failed_attempts_and_allows_login_after_the_window(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.test',
            'is_admin' => true,
        ]);
        $throttleKey = Str::lower($user->email).'|127.0.0.1';

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->from(route('login'))
                ->post(route('login'), [
                    'email' => $user->email,
                    'password' => 'password-salah',
                ])
                ->assertRedirect(route('login'))
                ->assertSessionHasErrors('email', 'Email atau password salah.');
        }

        $this->from(route('login'))
            ->post(route('login'), [
                'email' => $user->email,
                'password' => 'password-salah',
            ])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email', 'Terlalu banyak percobaan login. Coba lagi dalam 60 detik.');

        $this->travel(61)->seconds();
        RateLimiter::clear($throttleKey);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($user);
    }
}
