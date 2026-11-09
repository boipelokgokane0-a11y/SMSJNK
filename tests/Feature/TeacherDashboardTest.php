<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TeacherDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    }

    public function test_teacher_dashboard_renders_all_required_sections_and_metrics(): void
    {
        $teacher = User::factory()->create([
            'role' => 'teacher',
            'name' => 'Mrs. Anderson',
            'email' => 'anderson@test.com',
            'subject_to_be_taught' => 'Mathematics',
            'school' => 'Oakridge High',
            'percel_number' => 'PRCL-101',
            'dob' => '1985-05-14',
            'gender' => 'Female',
            'ethnicity' => 'African',
            'id_number' => '8505141234088',
            'passport' => 'T1234567',
            'marital_status' => 'Married',
            'contact_number' => '0829876543',
            'address' => '42 Union Avenue, Pretoria',
            'next_of_kin_name' => 'John Anderson',
            'next_of_kin_relationship' => 'Spouse',
            'next_of_kin_contact' => '0831234567',
        ]);
        $teacher->assignRole('teacher');

        $response = $this->actingAs($teacher)->get('/teacher/dashboard');

        $response->assertStatus(200);

        // 1. Welcome Teacher
        $response->assertSee('Teacher Welcome Dashboard');
        $response->assertSee('Welcome Teacher Mrs. Anderson!');

        // 2. Total number of students
        $response->assertSee('Total Number of Students');
        $response->assertSee('142');

        // 3. My Classes
        $response->assertSee('My Classes');
        $response->assertSee('Grade 12-A');
        $response->assertSee('Grade 11-B');
        $response->assertSee('Grade 10-A');
        $response->assertSee('Grade 12-C');

        // 4. Attendance Rate
        $response->assertSee('Attendance Rate');
        $response->assertSee('96.8%');

        // 5. Pending Marks
        $response->assertSee('Pending Marks');
        $response->assertSee('18');

        // 6. Assignments and Marks
        $response->assertSee('Assignments and Marks');
        $response->assertSee('Term 1 Differential Calculus Formal Test');

        // 7. Timetable
        $response->assertSee('Weekly Instructional Timetable');
        $response->assertSee('Monday Schedule');

        // 8. Student Performance
        $response->assertSee('Student Performance');
        $response->assertSee('97.2%');
        $response->assertSee('Top Academic Achievers');

        // 9. My Profile
        $response->assertSee('My Profile');
        $response->assertSee('PRCL-101');
        $response->assertSee('Oakridge High');
        $response->assertSee('Mathematics');
        $response->assertSee('8505141234088');
        $response->assertSee('John Anderson');

        // 10. Log Out buttons
        $response->assertSee('Log Out');
        $response->assertSee('Log Out of Teacher Account');

        // 11. Metrics of Binary
        $response->assertSee('BIN // 0001');
        $response->assertSee('BIN // 0010');
        $response->assertSee('BIN // 0011');
        $response->assertSee('BIN // 0100');

        // 12. SADTU and Teachers and Learners Pictures
        $response->assertSee('SADTU');
        $response->assertSee('Teachers &amp; Learners Interaction', false);
        $response->assertSee('https://images.unsplash.com/');

        // 13. Dark blue canvas and binary elements on the dashboard
        $response->assertSee('bg-[#071330]');
        $response->assertSee('bg-[#081538]');
        $response->assertSee('BINARY MATRIX');
        $response->assertSee('01001010 01001011');
        $response->assertSee('border-orange-500');
    }
}
