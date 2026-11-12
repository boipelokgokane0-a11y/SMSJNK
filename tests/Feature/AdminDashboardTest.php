<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_view_dashboard_with_correct_counts()
    {
        // create admin user
        $admin = User::factory()->create(['role' => 'admin']);
        // create students and teachers
        User::factory()->count(5)->create(['role' => 'student']);
        User::factory()->count(3)->create(['role' => 'teacher']);

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.admin');
        // Verify counts are displayed
        $response->assertSee('5'); // total students
        $response->assertSee('3'); // total teachers
        // Quick‑action buttons etc.
        $response->assertSee('Register Students');
        $response->assertSee('Create Class');
        $response->assertSee('Generate Report');
        $response->assertSee('Add Teacher');
        $response->assertSee('Recent Activities');
        $response->assertSee('Log Out');
    }
}
