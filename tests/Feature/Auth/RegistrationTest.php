<?php

namespace Tests\Feature\Auth;

use App\Events\RegisteredUser;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        Event::fake();

        $response = $this->post('/register', [
            'name' => 'Test User',
            'username' => 'test_user',
            'email' => 'test@example.com',
            'password' => 'Password22$',
            'password_confirmation' => 'Password22$',
            'confirm_age' => true,
        ]);

        // Assert the event was dispatched
        Event::assertDispatched(RegisteredUser::class);
        Event::assertDispatched(Registered::class);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
