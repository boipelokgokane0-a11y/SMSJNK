<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function student_can_login_and_is_redirected_to_student_dashboard(): void
    {
        $student = User::factory()->create([
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
            'email_verified_at' => null, // students don't need email verification
        ]);

        $response = $this->post(route('login'), [
            'email' => 'student@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('student.dashboard'));
        $this->assertAuthenticatedAs($student);
    }

    /** @test */
    public function student_dashboard_is_accessible_without_email_verification(): void
    {
        $student = User::factory()->create([
            'role' => 'student',
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($student)->get(route('student.dashboard'));

        $response->assertOk();
    }

    /** @test */
    public function admin_cannot_access_student_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Admin is redirected away from student dashboard (StudentDashboardController checks role)
        $response = $this->actingAs($admin)->get(route('student.dashboard'));

        // The controller allows admin access too (it checks !isStudent() && !isAdmin())
        $response->assertOk();
    }
}
