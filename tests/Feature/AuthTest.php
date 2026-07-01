<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered(): void
    {
        $this->get('/login')
            ->assertOk()
            ->assertSee('Masuk')
            ->assertSeeText('Username: admin')
            ->assertSeeText('Password: password');
    }

    public function test_user_can_login_with_username_and_password(): void
    {
        $this->withoutMiddleware(ValidateCsrfToken::class);

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->post('/login', [
            'username' => 'admin',
            'password' => 'password',
        ])->assertRedirect(route('admin.produk.index'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_login_shows_indonesian_error_message(): void
    {
        $this->withoutMiddleware(ValidateCsrfToken::class);

        $this->post('/login', [
            'username' => 'admin',
            'password' => 'wrong-password',
        ])
            ->assertSessionHasErrors(['username' => 'Username atau password salah.']);
    }

    public function test_user_can_logout(): void
    {
        $this->withoutMiddleware(ValidateCsrfToken::class);

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->actingAs($user)
            ->post('/logout')
            ->assertRedirect(route('home'));

        $this->assertGuest();
    }
}
