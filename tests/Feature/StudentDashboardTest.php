<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class StudentDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    }

    public function test_student_dashboard_renders_all_required_student_account_sections(): void
    {
        $student = User::factory()->create([
            'role' => 'student',
            'name' => 'Lindiwe Dlamini',
            'first_name' => 'Lindiwe',
            'surname' => 'Dlamini',
            'email' => 'lindiwe@jkdesignsacademy.co.za',
            'dob' => '2009-03-25',
            'gender' => 'Female',
            'ethnicity' => 'African / Black',
            'id_number' => '0903251234088',
            'passport' => 'A9876543',
            'marital_status' => 'Single',
            'address' => '78 Mandela Boulevard, Hatfield, Pretoria',
            'contact_number' => '0821234567',
            'grade' => 'Grade 11',
            'school' => 'J & K Designs Academy',
            'student_number' => 'STU-2026-0042',
            'class_allocation' => 'Grade 11-A (Room 102)',
            'account_status' => 'Active',
            'academic_year' => '2026/2027',
            'next_of_kin_name' => 'Sipho Dlamini',
            'next_of_kin_relationship' => 'Father',
            'next_of_kin_contact' => '0839876543',
        ]);
        $student->assignRole('student');

        $response = $this->actingAs($student)->get('/student/dashboard');

        $response->assertStatus(200);

        // 1. Student Number (Big and Bold)
        $response->assertSee('STU-2026-0042');
        $response->assertSee('Student Number');

        // 2. Class Allocation (Bold)
        $response->assertSee('Grade 11-A (Room 102)');
        $response->assertSee('Class Allocation');

        // 3. Account Status (Uses Green)
        $response->assertSee('ACTIVE');
        $response->assertSee('ACCOUNT STATUS');
        $response->assertSee('text-emerald-400');

        // 4. Academic Year (Bold)
        $response->assertSee('2026/2027');
        $response->assertSee('Academic Year');

        // 5. My Profile (Captivating distinct styling & Personal Info)
        $response->assertSee('My Profile (Personal Information)');
        $response->assertSee('Lindiwe Dlamini');
        $response->assertSee('0903251234088');
        $response->assertSee('A9876543');
        $response->assertSee('78 Mandela Boulevard, Hatfield, Pretoria');
        $response->assertSee('0821234567');
        $response->assertSee('Sipho Dlamini');
        $response->assertSee('Father');
        $response->assertSee('0839876543');

        // 6. My Subjects listed and pictures removed
        $response->assertSee('My Enrolled Subjects');
        $response->assertSee('Mathematics & Calculus');
        $response->assertSee('Physical Sciences & Mechanics');
        $response->assertSee('English Language & Literature');
        $response->assertSee('Computer Applications & Tech');
        $response->assertDontSee('<img', false);

        // 7. Timetable with fun bright pink and green colors
        $response->assertSee('Weekly Academic Timetable');
        $response->assertSee('Monday Routine');
        $response->assertSee('Tuesday Routine');
        $response->assertSee('Wednesday Routine');
        $response->assertSee('Thursday Routine');
        $response->assertSee('Friday Routine');
        $response->assertSee('☕ Morning Interval');
        $response->assertSee('bg-pink-500');
        $response->assertSee('bg-emerald-400');

        // 8. School Announcements (Inviting for students)
        $response->assertSee('School Announcements');
        $response->assertSee('Term 1 Final Examination Timetable Published');
        $response->assertSee('Annual Science & Technology Innovation Fair 2026');

        // 9. Upcoming Examinations with Live Countdown Reminder
        $response->assertSee('Upcoming Examinations Timetable');
        $response->assertSee('Main Examination Hall');
        $response->assertSee('Paper 1 (Algebra, Equations & Calculus)');
        $response->assertSee('Examination Alert');
        $response->assertSee('countdown');

        // 10. Attendance Records (Bold & Readily Readable)
        $response->assertSee('Attendance Records');
        $response->assertSee('Days Present');
        $response->assertSee('Days Absent');
        $response->assertSee('Days Late');
        $response->assertSee('Total School Days');
        $response->assertSee('97.4%');

        // 11. Request Form (Bold and Inviting)
        $response->assertSee('Submit a Student Request');
        $response->assertSee('Request Category');
        $response->assertSee('SUBMIT OFFICIAL REQUEST');

        // 12. Option to Change Colour
        $response->assertSee('Dashboard Theme');
        $response->assertSee('setTheme');

        // 13. Bold Logout Buttons (Never Forgotten)
        $response->assertSee('LOG OUT');
        $response->assertSee('LOG OUT OF STUDENT ACCOUNT');

        // 14. Top navigation and header are blue without white strip
        $response->assertSee('bg-[#081538]');
        $response->assertSee('bg-[#0b1d4d]');
    }

    public function test_student_can_submit_request_form(): void
    {
        $student = User::factory()->create([
            'role' => 'student',
            'name' => 'Zola Nene',
            'grade' => 'Grade 11',
        ]);
        $student->assignRole('student');

        $response = $this->actingAs($student)->post('/student/request', [
            'request_type' => 'Academic Tutoring & Extra Coaching',
            'subject' => 'Mathematics & Calculus',
            'urgency' => 'High Priority (Within 24 hours)',
            'details' => 'I would like to request extra math tutorials for differential calculus before next week exams.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('request_success');
    }

    public function test_student_model_provides_automatic_fallbacks_for_student_identifiers(): void
    {
        $student = User::factory()->create([
            'role' => 'student',
            'name' => 'Thabo Molefe',
            'grade' => 'Grade 10',
            'student_number' => null,
            'class_allocation' => null,
            'account_status' => null,
            'academic_year' => null,
        ]);
        $student->assignRole('student');

        $this->assertNotEmpty($student->student_number);
        $this->assertStringStartsWith('STU-2026-', $student->student_number);
        $this->assertEquals('Grade 10 - Class A', $student->class_allocation);
        $this->assertEquals('Active', $student->account_status);
        $this->assertEquals('2026/2027', $student->academic_year);
    }

    public function test_student_registration_assigns_student_number_and_academic_year(): void
    {
        $response = $this->post('/register/student', [
            'first_name' => 'Kagiso',
            'surname' => 'Mabaso',
            'email' => 'kagiso@example.com',
            'dob' => '2008-07-14',
            'gender' => 'Male',
            'ethnicity' => 'African / Black',
            'id_number' => '0807141234567',
            'passport' => 'P123456',
            'marital_status' => 'Single',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'address' => '45 Brooklyn Street, Pretoria',
            'contact_number' => '0812345679',
            'grade' => 'Grade 12',
            'next_of_kin_name' => 'Grace Mabaso',
            'next_of_kin_relationship' => 'Mother',
            'next_of_kin_contact' => '0823456780',
            'school' => 'J & K Designs Academy',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('student.dashboard'));

        $this->assertDatabaseHas('users', [
            'email' => 'kagiso@example.com',
            'role' => 'student',
            'grade' => 'Grade 12',
            'account_status' => 'Active',
            'academic_year' => '2026/2027',
        ]);

        $user = User::where('email', 'kagiso@example.com')->first();
        $this->assertNotNull($user->student_number);
        $this->assertNotNull($user->class_allocation);
    }

    public function test_website_and_login_metrics_of_binary_use_blue_and_light(): void
    {
        // 1. Welcome page metrics of binary in blue & light
        $welcomeResponse = $this->get('/');
        $welcomeResponse->assertStatus(200);
        $welcomeResponse->assertSee('BIN // 0001');
        $welcomeResponse->assertSee('BIN // 0010');
        $welcomeResponse->assertSee('hero-stat-code');
        $welcomeResponse->assertSee('#38bdf8');

        // 2. Login page metrics of binary, dashboard colours (blue & light blue), and student pictures
        $loginResponse = $this->get('/login');
        $loginResponse->assertStatus(200);
        $loginResponse->assertSee('BIN // 0001');
        $loginResponse->assertSee('BIN // 0010');
        $loginResponse->assertSee('01001010 01001011');
        $loginResponse->assertSee('text-blue-600');
        $loginResponse->assertSee('bg-blue-50');

        // Verify dashboard blue colours, big bold typography and captivating teacher pictures
        $loginResponse->assertSee('bg-[#0b1d4d]');
        $loginResponse->assertSee('bg-[#0f286b]');
        $loginResponse->assertSee('bg-[#081538]');
        $loginResponse->assertSee('border-sky-400');
        $loginResponse->assertSee('Teachers Workshops');
        $loginResponse->assertSee('Teachers in Class');
        $loginResponse->assertSee('WELCOME BACK');
        $loginResponse->assertSee('TEACHER');
        $loginResponse->assertDontSee('Students Running');
        $loginResponse->assertDontSee('Group Thinking');
        $loginResponse->assertSee('EMAIL ADDRESS');
        $loginResponse->assertSee('Log in');
        $loginResponse->assertDontSee('bg-white');
    }
}
