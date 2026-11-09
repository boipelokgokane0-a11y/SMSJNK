<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    }

    public function test_admin_can_view_admin_dashboard_with_logout_button(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'name' => 'Super Admin',
            'email' => 'admin@test.com',
        ]);
        $admin->assignRole('admin');

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Admin Welcome Dashboard');
        $response->assertSee('Welcome, Super Admin!');
        $response->assertSee('Log Out');
        $response->assertSee('Total Students');
        $response->assertSee('Total Teachers');
    }

    public function test_teacher_can_view_teacher_dashboard_with_logout_button(): void
    {
        $teacher = User::factory()->create([
            'role' => 'teacher',
            'name' => 'Mrs. Anderson',
            'email' => 'anderson@test.com',
            'subject_to_be_taught' => 'Mathematics',
            'school' => 'Oakridge High',
            'percel_number' => 'PRCL-101',
        ]);
        $teacher->assignRole('teacher');

        $response = $this->actingAs($teacher)->get('/teacher/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Teacher Welcome Dashboard');
        $response->assertSee('Welcome Teacher');
        $response->assertSee('Mrs. Anderson');
        $response->assertSee('Log Out');
        $response->assertSee('Mathematics');
        $response->assertSee('Oakridge High');
        $response->assertSee('PRCL-101');
    }

    public function test_student_can_view_student_dashboard_with_logout_button(): void
    {
        $student = User::factory()->create([
            'role' => 'student',
            'name' => 'Alex Johnson',
            'email' => 'alex@test.com',
            'grade' => 'Grade 11',
            'school' => 'Hillside Academy',
        ]);
        $student->assignRole('student');

        $response = $this->actingAs($student)->get('/student/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Student Welcome Dashboard');
        $response->assertSee('Welcome, Alex Johnson!');
        $response->assertSee('Log Out');
        $response->assertSee('Grade 11');
        $response->assertSee('Hillside Academy');
    }

    public function test_dashboard_dispatches_to_correct_welcome_dashboard_per_role(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $admin->assignRole('admin');
        $this->actingAs($admin)->get('/dashboard')
            ->assertRedirect(route('admin.dashboard'));

        $teacher = User::factory()->create(['role' => 'teacher']);
        $teacher->assignRole('teacher');
        $this->actingAs($teacher)->get('/dashboard')
            ->assertRedirect(route('teacher.dashboard'));

        $student = User::factory()->create(['role' => 'student']);
        $student->assignRole('student');
        $this->actingAs($student)->get('/dashboard')
            ->assertRedirect(route('student.dashboard'));
    }

    public function test_teacher_cannot_access_admin_dashboard(): void
    {
        $teacher = User::factory()->create(['role' => 'teacher']);
        $teacher->assignRole('teacher');

        $response = $this->actingAs($teacher)->get('/admin/dashboard');

        $response->assertRedirect(route('dashboard'));
    }

    public function test_student_cannot_access_admin_dashboard(): void
    {
        $student = User::factory()->create(['role' => 'student']);
        $student->assignRole('student');

        $response = $this->actingAs($student)->get('/admin/dashboard');

        $response->assertRedirect(route('dashboard'));
    }
}
