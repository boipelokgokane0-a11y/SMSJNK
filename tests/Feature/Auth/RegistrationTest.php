<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    }

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Student Registration');
        $response->assertSee('Teacher Registration');
    }

    public function test_student_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register/student');

        $response->assertStatus(200);
        $response->assertSee('Student Registration');
        $response->assertSee('Grade');
        $response->assertSee('School');
        $response->assertSee('Next of Kin Names');
    }

    public function test_teacher_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register/teacher');

        $response->assertStatus(200);
        $response->assertSee('Teacher Registration');
        $response->assertSee('Percel Number');
        $response->assertSee('Subject to be Taught');
        $response->assertSee('Qualifications Document');
    }

    public function test_new_students_can_register(): void
    {
        $response = $this->post('/register/student', [
            'first_name' => 'John',
            'surname' => 'Doe',
            'email' => 'student@example.com',
            'dob' => '2008-05-15',
            'gender' => 'Male',
            'ethnicity' => 'African / Black',
            'id_number' => '0805151234567',
            'passport' => 'A12345678',
            'marital_status' => 'Single',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'address' => '123 School Street, Pretoria',
            'contact_number' => '0812345678',
            'grade' => 'Grade 10',
            'next_of_kin_name' => 'Jane Doe',
            'next_of_kin_relationship' => 'Parent / Guardian',
            'next_of_kin_contact' => '0823456789',
            'school' => 'Pretoria High School',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('student.dashboard'));

        $this->assertDatabaseHas('users', [
            'email' => 'student@example.com',
            'name' => 'John Doe',
            'first_name' => 'John',
            'surname' => 'Doe',
            'role' => 'student',
            'grade' => 'Grade 10',
            'school' => 'Pretoria High School',
            'marital_status' => 'Single',
            'next_of_kin_name' => 'Jane Doe',
        ]);

        $user = User::where('email', 'student@example.com')->first();
        $this->assertTrue($user->hasRole('student'));
        $this->assertTrue($user->isStudent());
    }

    public function test_new_teachers_can_register(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('qualifications.pdf', 500, 'application/pdf');

        $response = $this->post('/register/teacher', [
            'first_name' => 'Sarah',
            'surname' => 'Smith',
            'email' => 'teacher@example.com',
            'dob' => '1985-08-20',
            'gender' => 'Female',
            'ethnicity' => 'White',
            'id_number' => '8508201234567',
            'passport' => 'B98765432',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'percel_number' => 'PRCL-998877',
            'address' => '456 College Avenue, Johannesburg',
            'marital_status' => 'Married',
            'qualifications_document' => $file,
            'contact_number' => '0834567890',
            'subject_to_be_taught' => 'Mathematics & Science',
            'next_of_kin_name' => 'Robert Smith',
            'next_of_kin_relationship' => 'Spouse',
            'next_of_kin_contact' => '0845678901',
            'school' => 'Johannesburg Academy',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('teacher.dashboard'));

        $this->assertDatabaseHas('users', [
            'email' => 'teacher@example.com',
            'name' => 'Sarah Smith',
            'first_name' => 'Sarah',
            'surname' => 'Smith',
            'role' => 'teacher',
            'percel_number' => 'PRCL-998877',
            'subject_to_be_taught' => 'Mathematics & Science',
            'school' => 'Johannesburg Academy',
        ]);

        $user = User::where('email', 'teacher@example.com')->first();
        $this->assertNotNull($user->qualifications_document);
        Storage::disk('public')->assertExists($user->qualifications_document);

        $this->assertTrue($user->hasRole('teacher'));
        $this->assertTrue($user->isTeacher());
    }
}
