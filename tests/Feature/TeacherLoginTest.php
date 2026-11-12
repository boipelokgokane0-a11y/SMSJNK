<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeacherLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function teacher_can_login_and_is_redirected_to_teacher_dashboard(): void
    {
        $teacher = User::factory()->teacher()->create([
            'email' => 'teacher@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => null, // teachers don't need email verification
        ]);

        $response = $this->post(route('login'), [
            'email' => 'teacher@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('teacher.dashboard'));
        $this->assertAuthenticatedAs($teacher);
    }

    /** @test */
    public function teacher_dashboard_is_accessible_without_email_verification(): void
    {
        $teacher = User::factory()->teacher()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($teacher)->get(route('teacher.dashboard'));

        $response->assertOk();
    }

    /** @test */
    public function student_cannot_access_teacher_dashboard(): void
    {
        $student = User::factory()->create([
            'role' => 'student',
            'email_verified_at' => null,
        ]);

        // Student gets redirected away from teacher dashboard
        $response = $this->actingAs($student)->get(route('teacher.dashboard'));

        $response->assertRedirect(route('dashboard'));
    }
}
