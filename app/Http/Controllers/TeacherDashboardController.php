<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TeacherDashboardController extends Controller
{
    /**
     * Display the Teacher Welcome Dashboard.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if (!$user->isTeacher() && !$user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $myClasses = $this->getMyClasses();
        $totalStudents = array_sum(array_column($myClasses, 'students_count'));
        $attendance = $this->getAttendanceData();
        $pendingMarksCount = 18;
        $assignments = $this->getAssignments();
        $timetable = $this->getTimetable();
        $studentPerformance = $this->getStudentPerformance();
        $binaryMetrics = [
            ['code' => 'BIN // 0001', 'label' => 'Total Students', 'value' => (string) $totalStudents],
            ['code' => 'BIN // 0010', 'label' => 'Attendance Rate', 'value' => $attendance['rate'] . '%'],
            ['code' => 'BIN // 0011', 'label' => 'Pending Marks', 'value' => (string) $pendingMarksCount],
            ['code' => 'BIN // 0100', 'label' => 'Allocated Classes', 'value' => count($myClasses) . ' Classes'],
        ];

        return view('dashboard.teacher', compact(
            'user',
            'totalStudents',
            'myClasses',
            'attendance',
            'pendingMarksCount',
            'assignments',
            'timetable',
            'studentPerformance',
            'binaryMetrics'
        ));
    }

    /**
     * Download the qualifications document.
     */
    public function downloadQualifications(Request $request, User $user): StreamedResponse|RedirectResponse
    {
        $currentUser = $request->user();

        if (!$currentUser->isAdmin() && $currentUser->id !== $user->id) {
            abort(403, 'Unauthorized access to qualifications document.');
        }

        if (!$user->qualifications_document || !Storage::disk('public')->exists($user->qualifications_document)) {
            return back()->with('error', 'Qualifications document not found.');
        }

        return Storage::disk('public')->download($user->qualifications_document);
    }

    /**
     * Get the classes allocated to the teacher.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getMyClasses(): array
    {
        return [
            [
                'grade' => 'Grade 12-A',
                'subject' => 'Pure Mathematics & Calculus',
                'room' => 'Room 12B (Main Campus)',
                'students_count' => 38,
                'class_rep' => 'Lindiwe Dlamini',
                'periods_per_week' => 6,
                'average' => 81.2,
                'color' => 'blue',
            ],
            [
                'grade' => 'Grade 11-B',
                'subject' => 'Mathematics & Trigonometry',
                'room' => 'Room 102 (Language Hub)',
                'students_count' => 34,
                'class_rep' => 'Sipho Khumalo',
                'periods_per_week' => 5,
                'average' => 74.5,
                'color' => 'red',
            ],
            [
                'grade' => 'Grade 10-A',
                'subject' => 'Foundation Algebra & Geometry',
                'room' => 'Room 04A (STEM Studio)',
                'students_count' => 36,
                'class_rep' => 'Zola Nene',
                'periods_per_week' => 5,
                'average' => 77.8,
                'color' => 'orange',
            ],
            [
                'grade' => 'Grade 12-C',
                'subject' => 'Applied Mathematics & Statistics',
                'room' => 'Room 08 (Advanced Lab)',
                'students_count' => 34,
                'class_rep' => 'Kagiso Molefe',
                'periods_per_week' => 4,
                'average' => 73.6,
                'color' => 'blue',
            ],
        ];
    }

    /**
     * Get the attendance rate and breakdown for the educator's classes.
     *
     * @return array<string, mixed>
     */
    protected function getAttendanceData(): array
    {
        return [
            'rate' => 96.8,
            'days_present' => 137,
            'days_late' => 3,
            'days_absent' => 2,
            'total_students' => 142,
            'status' => 'Excellent Standing',
            'recent_logs' => [
                ['date' => '07 Nov 2026', 'class' => 'Grade 12-A', 'present' => 37, 'absent' => 1, 'rate' => 97.4],
                ['date' => '07 Nov 2026', 'class' => 'Grade 11-B', 'present' => 33, 'absent' => 1, 'rate' => 97.1],
                ['date' => '06 Nov 2026', 'class' => 'Grade 10-A', 'present' => 35, 'absent' => 1, 'rate' => 97.2],
                ['date' => '06 Nov 2026', 'class' => 'Grade 12-C', 'present' => 32, 'absent' => 2, 'rate' => 94.1],
            ],
        ];
    }

    /**
     * Get assignments and marks information.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getAssignments(): array
    {
        return [
            [
                'title' => 'Term 1 Differential Calculus Formal Test',
                'class' => 'Grade 12-A',
                'total_marks' => 100,
                'due_date' => '05 Nov 2026',
                'submissions' => 38,
                'total_students' => 38,
                'graded_count' => 26,
                'pending_count' => 12,
                'status' => 'Pending Marks',
                'average_score' => 81.4,
                'color' => 'orange',
            ],
            [
                'title' => 'Trigonometry & Functions Practical Assessment',
                'class' => 'Grade 11-B',
                'total_marks' => 75,
                'due_date' => '06 Nov 2026',
                'submissions' => 34,
                'total_students' => 34,
                'graded_count' => 28,
                'pending_count' => 6,
                'status' => 'Pending Marks',
                'average_score' => 73.8,
                'color' => 'red',
            ],
            [
                'title' => 'Euclidean Geometry & Circle Proofs Task',
                'class' => 'Grade 10-A',
                'total_marks' => 50,
                'due_date' => '02 Nov 2026',
                'submissions' => 36,
                'total_students' => 36,
                'graded_count' => 36,
                'pending_count' => 0,
                'status' => 'Graded & Published',
                'average_score' => 78.5,
                'color' => 'blue',
            ],
            [
                'title' => 'Probability, Statistics & Modeling Project',
                'class' => 'Grade 12-C',
                'total_marks' => 80,
                'due_date' => '28 Oct 2026',
                'submissions' => 34,
                'total_students' => 34,
                'graded_count' => 34,
                'pending_count' => 0,
                'status' => 'Graded & Published',
                'average_score' => 75.2,
                'color' => 'blue',
            ],
        ];
    }

    /**
     * Get the educator's teaching timetable.
     *
     * @return array<string, array<int, array<string, mixed>>>
     */
    protected function getTimetable(): array
    {
        return [
            'Monday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Grade 12-A Mathematics (Calculus)', 'room' => 'Room 12B', 'theme' => 'blue'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Grade 11-B Trigonometry', 'room' => 'Room 102', 'theme' => 'red'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Staff Interval / Tea', 'room' => 'Staff Common Room', 'theme' => 'orange'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Grade 10-A Algebra & Functions', 'room' => 'Room 04A', 'theme' => 'blue'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'Teacher Planning & Assessment Prep', 'room' => 'Staff Workstation', 'theme' => 'red'],
                ['period' => 'Lunch', 'time' => '12:55 - 13:40', 'subject' => '🍽️ Educator Lunch & Networking', 'room' => 'Dining Pavilion', 'theme' => 'orange'],
                ['period' => 5, 'time' => '13:40 - 14:30', 'subject' => 'Grade 12-C Applied Mathematics', 'room' => 'Room 08', 'theme' => 'blue'],
            ],
            'Tuesday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Grade 10-A Foundation Geometry', 'room' => 'Room 04A', 'theme' => 'orange'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Grade 12-A Differential Calculus', 'room' => 'Room 12B', 'theme' => 'blue'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Staff Common Room', 'theme' => 'red'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Grade 11-B Advanced Problem Solving', 'room' => 'Room 102', 'theme' => 'orange'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'SADTU Staff Representative Consultation', 'room' => 'Union Office', 'theme' => 'red'],
                ['period' => 5, 'time' => '12:05 - 12:55', 'subject' => 'Grade 12-C Statistics Workshop', 'room' => 'Room 08', 'theme' => 'blue'],
            ],
            'Wednesday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Grade 12-A Matric Exam Preparation', 'room' => 'Room 12B', 'theme' => 'blue'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Grade 10-A Algebra & Sequences', 'room' => 'Room 04A', 'theme' => 'red'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Staff Common Room', 'theme' => 'orange'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Grade 11-B Analytical Geometry', 'room' => 'Room 102', 'theme' => 'blue'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'Departmental Subject Moderation', 'room' => 'Maths Office', 'theme' => 'red'],
                ['period' => 5, 'time' => '13:40 - 14:30', 'subject' => '🏆 Sports & Learner Mentorship', 'room' => 'Sports Complex', 'theme' => 'orange'],
            ],
            'Thursday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Grade 11-B Trigonometry Equations', 'room' => 'Room 102', 'theme' => 'red'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Grade 12-C Data Handling & Probability', 'room' => 'Room 08', 'theme' => 'blue'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Staff Common Room', 'theme' => 'orange'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Grade 12-A Optimization & Graphs', 'room' => 'Room 12B', 'theme' => 'blue'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'Grade 10-A Euclidean Proofs', 'room' => 'Room 04A', 'theme' => 'red'],
                ['period' => 5, 'time' => '13:40 - 14:30', 'subject' => '💡 Extra Tutoring & Remedial Coaching', 'room' => 'Room 12B', 'theme' => 'orange'],
            ],
            'Friday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Grade 10-A Weekly Mastery Quiz', 'room' => 'Room 04A', 'theme' => 'orange'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Grade 12-A Calculus Past Papers', 'room' => 'Room 12B', 'theme' => 'blue'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Staff Common Room', 'theme' => 'red'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Grade 11-B Test Review & Feedback', 'room' => 'Room 102', 'theme' => 'orange'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => '🏛️ Whole-School Assembly & House Pride', 'room' => 'Main Auditorium', 'theme' => 'blue'],
                ['period' => 5, 'time' => '12:05 - 12:55', 'subject' => 'Faculty Debrief & SADTU Branch Meet', 'room' => 'Staff Hall', 'theme' => 'red'],
            ],
        ];
    }

    /**
     * Get student performance metrics and top achievers.
     *
     * @return array<string, mixed>
     */
    protected function getStudentPerformance(): array
    {
        return [
            'pass_rate' => 97.2,
            'distinction_rate' => 24.0,
            'class_average' => 76.8,
            'total_assessed' => 142,
            'top_achievers' => [
                ['name' => 'Lindiwe Dlamini', 'grade' => 'Grade 12-A', 'score' => 94.5, 'distinctions' => 3],
                ['name' => 'Thabo Sithole', 'grade' => 'Grade 12-A', 'score' => 91.0, 'distinctions' => 2],
                ['name' => 'Sipho Khumalo', 'grade' => 'Grade 11-B', 'score' => 89.5, 'distinctions' => 2],
                ['name' => 'Zola Nene', 'grade' => 'Grade 10-A', 'score' => 88.0, 'distinctions' => 1],
                ['name' => 'Kagiso Molefe', 'grade' => 'Grade 12-C', 'score' => 86.5, 'distinctions' => 1],
            ],
            'grade_distribution' => [
                ['bracket' => '80% - 100% (Level 7)', 'count' => 34, 'percentage' => 24, 'color' => 'blue'],
                ['bracket' => '70% - 79% (Level 6)', 'count' => 52, 'percentage' => 37, 'color' => 'orange'],
                ['bracket' => '50% - 69% (Level 4-5)', 'count' => 52, 'percentage' => 37, 'color' => 'blue'],
                ['bracket' => 'Below 50% (Remedial)', 'count' => 4, 'percentage' => 2, 'color' => 'red'],
            ],
        ];
    }
}
