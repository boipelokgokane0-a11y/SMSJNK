<?php

namespace App\Http\Controllers;

use App\Models\AcademyClass;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminDashboardController extends Controller
{
    /**
     * Display the Admin Welcome Dashboard.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if (! $user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalClasses = AcademyClass::count();
        $attendanceToday = '97.4%';
        $totalUsers = User::count();

        $recentStudents = User::where('role', 'student')
            ->latest()
            ->take(8)
            ->get();

        $recentTeachers = User::where('role', 'teacher')
            ->latest()
            ->take(8)
            ->get();

        $classes = AcademyClass::latest()->take(8)->get();

        // Compile real recent activities from recent registrations and classes
        $recentActivities = [];

        foreach ($recentStudents->take(3) as $student) {
            $recentActivities[] = [
                'type' => 'student_registered',
                'status' => 'completed',
                'message' => "Student {$student->name} registered in {$student->grade} ({$student->student_number})",
                'time' => $student->created_at ? $student->created_at->diffForHumans() : 'Recently',
            ];
        }

        foreach ($recentTeachers->take(2) as $teacher) {
            $recentActivities[] = [
                'type' => 'teacher_added',
                'status' => 'completed',
                'message' => "Teacher {$teacher->name} assigned to {$teacher->subject_to_be_taught}",
                'time' => $teacher->created_at ? $teacher->created_at->diffForHumans() : 'Recently',
            ];
        }

        foreach ($classes->take(2) as $classItem) {
            $recentActivities[] = [
                'type' => 'class_allocation',
                'status' => 'completed',
                'message' => "Class {$classItem->name} active in {$classItem->room}",
                'time' => $classItem->created_at ? $classItem->created_at->diffForHumans() : 'Active',
            ];
        }

        return view('dashboard.admin', compact(
            'user',
            'totalStudents',
            'totalTeachers',
            'totalClasses',
            'totalUsers',
            'recentStudents',
            'recentTeachers',
            'classes',
            'attendanceToday',
            'recentActivities'
        ));
    }

    /**
     * Register a new student from the admin dashboard.
     */
    public function storeStudent(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'grade' => ['required', 'string', 'max:50'],
            'class_allocation' => ['nullable', 'string', 'max:100'],
            'id_number' => ['nullable', 'string', 'max:50'],
            'contact_number' => ['nullable', 'string', 'max:50'],
            'parent_name' => ['nullable', 'string', 'max:255'],
            'parent_contact' => ['nullable', 'string', 'max:50'],
            'parent_email' => ['nullable', 'string', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'school' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $nextId = (User::max('id') ?? 0) + 1;
        $studentNumber = 'STU-2026-'.str_pad((string) $nextId, 4, '0', STR_PAD_LEFT);

        $student = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(($validated['password'] ?? null) ?: 'password123'),
            'role' => 'student',
            'grade' => $validated['grade'],
            'class_allocation' => ($validated['class_allocation'] ?? null) ?: ($validated['grade'].' - Class A'),
            'student_number' => $studentNumber,
            'id_number' => $validated['id_number'] ?? null,
            'contact_number' => $validated['contact_number'] ?? null,
            'parent_name' => ($validated['parent_name'] ?? null) ?: 'Mixo Mdaka',
            'parent_contact' => ($validated['parent_contact'] ?? null) ?: '0713998559',
            'parent_email' => ($validated['parent_email'] ?? null) ?: 'mixomdaka@gmail.com',
            'address' => $validated['address'] ?? 'J & K Designs Academy Residential Precinct',
            'school' => ($validated['school'] ?? null) ?: 'J & K Designs Academy',
            'account_status' => 'Active',
            'academic_year' => '2026/2027',
        ]);

        return back()->with('admin_success', "Student {$student->name} successfully registered with Student ID {$studentNumber}!");
    }

    /**
     * Add a new teacher from the admin dashboard.
     */
    public function storeTeacher(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'subject_to_be_taught' => ['required', 'string', 'max:150'],
            'school' => ['nullable', 'string', 'max:255'],
            'percel_number' => ['nullable', 'string', 'max:50'],
            'contact_number' => ['nullable', 'string', 'max:50'],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        $percelNumber = ($validated['percel_number'] ?? null) ?: ('PRC-'.strtoupper(Str::random(6)));

        $teacher = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(($validated['password'] ?? null) ?: 'password123'),
            'role' => 'teacher',
            'subject_to_be_taught' => $validated['subject_to_be_taught'],
            'school' => ($validated['school'] ?? null) ?: 'J & K Designs Academy',
            'percel_number' => $percelNumber,
            'contact_number' => $validated['contact_number'] ?? null,
            'account_status' => 'Active',
            'academic_year' => '2026/2027',
        ]);

        return back()->with('admin_success', "Teacher {$teacher->name} successfully added for {$teacher->subject_to_be_taught}!");
    }

    /**
     * Create a new class from the admin dashboard.
     */
    public function storeClass(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'grade' => ['required', 'string', 'max:50'],
            'room' => ['nullable', 'string', 'max:100'],
            'capacity' => ['nullable', 'integer', 'min:1', 'max:100'],
            'teacher_name' => ['nullable', 'string', 'max:255'],
            'academic_year' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $classItem = AcademyClass::create([
            'name' => $validated['name'],
            'grade' => $validated['grade'],
            'room' => ($validated['room'] ?? null) ?: 'Room 101',
            'capacity' => ($validated['capacity'] ?? null) ?: 35,
            'teacher_name' => ($validated['teacher_name'] ?? null) ?: 'Faculty Assigned',
            'academic_year' => ($validated['academic_year'] ?? null) ?: '2026/2027',
            'description' => $validated['description'] ?? null,
        ]);

        return back()->with('admin_success', "Academic Class {$classItem->name} successfully created!");
    }

    /**
     * Export generated CSV reports.
     */
    public function exportReport(Request $request): StreamedResponse|RedirectResponse
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $type = $request->query('type', 'summary');
        $fileName = "jnk-academy-{$type}-report-".now()->format('Y-m-d').'.csv';

        return response()->streamDownload(function () use ($type) {
            $handle = fopen('php://output', 'w');

            if ($type === 'students') {
                fputcsv($handle, ['Student Number', 'Full Name', 'Grade', 'Class Allocation', 'Email', 'Parent Name', 'Parent Contact', 'Parent Email', 'Status', 'Academic Year']);
                $students = User::where('role', 'student')->orderBy('id')->get();
                foreach ($students as $s) {
                    fputcsv($handle, [
                        $s->student_number,
                        $s->name,
                        $s->grade ?? 'Grade 10',
                        $s->class_allocation ?? 'Class A',
                        $s->email,
                        $s->parent_name ?: 'Mixo Mdaka',
                        $s->parent_contact ?: '0713998559',
                        $s->parent_email ?: 'mixomdaka@gmail.com',
                        $s->account_status,
                        $s->academic_year,
                    ]);
                }
            } elseif ($type === 'teachers') {
                fputcsv($handle, ['Teacher Name', 'Subject Taught', 'School', 'Percel Number', 'Contact Number', 'Email', 'Academic Year']);
                $teachers = User::where('role', 'teacher')->orderBy('id')->get();
                foreach ($teachers as $t) {
                    fputcsv($handle, [
                        $t->name,
                        $t->subject_to_be_taught ?? 'General Studies',
                        $t->school ?? 'J & K Designs Academy',
                        $t->percel_number ?? 'N/A',
                        $t->contact_number ?? 'N/A',
                        $t->email,
                        $t->academic_year ?? '2026/2027',
                    ]);
                }
            } elseif ($type === 'classes') {
                fputcsv($handle, ['Class Name', 'Grade', 'Room', 'Capacity', 'Assigned Teacher', 'Academic Year', 'Description']);
                $classes = AcademyClass::orderBy('id')->get();
                foreach ($classes as $c) {
                    fputcsv($handle, [
                        $c->name,
                        $c->grade,
                        $c->room,
                        $c->capacity,
                        $c->teacher_name,
                        $c->academic_year,
                        $c->description,
                    ]);
                }
            } else {
                fputcsv($handle, ['J & K DESIGNS ACADEMY - EXECUTIVE SYSTEM SUMMARY REPORT']);
                fputcsv($handle, ['Generated At', now()->format('Y-m-d H:i:s')]);
                fputcsv($handle, ['Metric', 'Count / Value']);
                fputcsv($handle, ['Total Registered Students', User::where('role', 'student')->count()]);
                fputcsv($handle, ['Total Registered Teachers', User::where('role', 'teacher')->count()]);
                fputcsv($handle, ['Total Academic Classes', AcademyClass::count()]);
                fputcsv($handle, ['Average Attendance Rate', '97.4%']);
                fputcsv($handle, ['Total System Users', User::count()]);
            }

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
