<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortalAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_student_can_log_in_using_email_and_redirects_to_student_dashboard(): void
    {
        $response = $this->post(route('login'), [
            'email' => 'student@jkdesignsacademy.co.za',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('student.dashboard'));
        $this->assertAuthenticated();
        $this->assertTrue(auth()->user()->isStudent());
    }

    public function test_student_can_log_in_using_student_number(): void
    {
        $response = $this->post(route('login'), [
            'email' => 'STU-2026-0001',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('student.dashboard'));
        $this->assertAuthenticated();
        $this->assertEquals('student@jkdesignsacademy.co.za', auth()->user()->email);
    }

    public function test_teacher_can_log_in_using_email_and_redirects_to_teacher_dashboard(): void
    {
        $response = $this->post(route('login'), [
            'email' => 'teacher@jkdesignsacademy.co.za',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('teacher.dashboard'));
        $this->assertAuthenticated();
        $this->assertTrue(auth()->user()->isTeacher());
    }

    public function test_teacher_can_log_in_using_persal_number(): void
    {
        $response = $this->post(route('login'), [
            'email' => 'PER-8899',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('teacher.dashboard'));
        $this->assertAuthenticated();
        $this->assertEquals('teacher@jkdesignsacademy.co.za', auth()->user()->email);
    }

    public function test_administrator_can_log_in_using_email_and_redirects_to_admin_dashboard(): void
    {
        $response = $this->post(route('login'), [
            'email' => 'admin@jkdesignsacademy.co.za',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
        $this->assertTrue(auth()->user()->isAdmin());
    }

    public function test_administrator_portal_screen_renders_successfully(): void
    {
        $response = $this->get('/login?portal=admin');
        $response->assertStatus(200);
        $response->assertSee('OFFICIAL ADMINISTRATOR PORTAL');
        $response->assertSee('ACADEMY');
        $response->assertSee('LEADERSHIP');
        $response->assertSee('CAMPUS ADMINISTRATION');
        $response->assertSee('admin@jkdesignsacademy.co.za');
    }

    public function test_welcome_website_uses_student_login_page_palette(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('#081538');
        $response->assertSee('#0d225c');
        $response->assertSee('#22d3ee');
        $response->assertSee('#67e8f9');
        $response->assertSee('#38bdf8');
        $response->assertDontSee('#f59e0b');
    }
}
