<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const ROUTE_VIEW_PROFILE = 'profile.index';
    const ROUTE_UPDATE_PROFILE = 'profile.update';

    private $user;

    protected function setup(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_profile_screen()
    {
        $response = $this->actingAs($this->user)->get(route(self::ROUTE_VIEW_PROFILE));

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_update_profile()
    {
        $formData = collect([
            'name' => 'Baloon Baloon',
            'username' => 'my_new_user_name',
            'city' => 'Lagos',
            'country' => 'Nigeria',
        ]);

        $params = [
            'profile' => $this->user->username
        ];
        $data = $formData->merge($params);

        $response = $this->actingAs($this->user)->put(route(self::ROUTE_UPDATE_PROFILE, $data->all()));

        $response->assertRedirect();
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('users', $formData->toArray());
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_activity_logged_after_profile_update()
    {
        Storage::fake('avatars');

        $avatar = UploadedFile::fake()->image('avatar.jpg', 200, 200)->size(100);
        
        $formData = collect([
            'name' => 'Baloon Baloon',
            'username' => 'my_new_user_name',
            'city' => 'Lagos',
            'country' => 'Nigeria',
            // 'avatar' => $avatar
        ]);

        $params = [
            'profile' => $this->user->username
        ];
        $data = $formData->merge($params);

        $response = $this->actingAs($this->user)->put(route(self::ROUTE_UPDATE_PROFILE, $data->all()));

        $response->assertRedirect();
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseHas('users', $formData->toArray());
        // Storage::disk('avatars')->assertExists($avatar->hashName());

        //check logged attributes are the same with change attributes
        $loggedAttributes = Activity::where('causer_id', $this->user->id)->latest()->first();
        $this->assertContains($loggedAttributes['properties']['attributes'], $formData->toArray());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_change_password_from_profile()
    {
        $formData = collect([
            'current_password' => 'Password22$',
            'password' => 'Baloon222$',
            'password_confirmation' => 'Baloon222$',
        ]);

        $params = [
            'profile' => $this->user->username
        ];

        $data = $formData->merge($params);

        $response = $this->actingAs($this->user)->put(route(self::ROUTE_UPDATE_PROFILE, $data->all()));

        $response->assertRedirect();
        $response->assertSessionDoesntHaveErrors();

        //refresh user state
        $this->user->refresh();
        $this->assertTrue(Hash::check($formData['password'], $this->user->password));
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_cannot_change_password_with_wrong_password()
    {
        $formData = collect([
            'current_password' => 'WrongPassword',
            'password' => 'Baloon222$',
            'password_confirmation' => 'Baloon222$',
        ]);

        $params = [
            'profile' => $this->user->username
        ];

        $data = $formData->merge($params);

        $response = $this->actingAs($this->user)->put(route(self::ROUTE_UPDATE_PROFILE, $data->all()));

        $response->assertRedirect();
        $response->assertSessionHasErrors(['current_password']);

        //refresh user state
        $this->user->refresh();
        $this->assertFalse(Hash::check($formData['password'], $this->user->password));
    }
}
