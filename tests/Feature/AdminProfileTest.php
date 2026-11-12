<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    }

    /** @test */
    public function admin_sees_administrator_information_section_on_profile_page(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'name' => 'Jand K Design Academy Admin',
            'email' => 'admin@jnkdesignsacademy.co.za',
            'contact_number' => '0800123456',
        ]);
        $admin->assignRole('admin');

        $response = $this->actingAs($admin)->get('/profile/edit');
        $response->assertStatus(200);
        $response->assertSee('Administrator Information');
        $response->assertSee('Jand K Design Academy Admin');
        $response->assertSee('admin@jnkdesignsacademy.co.za');
        $response->assertSee('admin');
        $response->assertSee('0800123456');
        $response->assertDontSee('Student Information');
    }
}
