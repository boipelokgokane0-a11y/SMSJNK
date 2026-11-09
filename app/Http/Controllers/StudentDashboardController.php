<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentDashboardController extends Controller
{
    /**
     * Display the Student Welcome Dashboard and Account portal.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if (!$user->isStudent() && !$user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $subjects = $this->getSubjects();
        $timetable = $this->getTimetable();
        $announcements = $this->getAnnouncements();
        $upcomingExams = $this->getUpcomingExams();
        $attendance = $this->getAttendance();

        return view('dashboard.student', compact(
            'user',
            'subjects',
            'timetable',
            'announcements',
            'upcomingExams',
            'attendance'
        ));
    }

    /**
     * Handle student support and service request submission.
     */
    public function storeRequest(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'request_type' => ['required', 'string', 'max:100'],
            'subject' => ['nullable', 'string', 'max:100'],
            'urgency' => ['required', 'string', 'max:50'],
            'details' => ['required', 'string', 'max:2000'],
        ]);

        $referenceNumber = 'REQ-2026-' . strtoupper(substr(md5(uniqid((string) mt_rand(), true)), 0, 6));

        return back()->with('request_success', "Your request has been successfully registered! Reference: {$referenceNumber}. The academic support office will contact you within 24 hours.");
    }

    /**
     * Get the student's enrolled academic subjects with pictures and descriptions.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getSubjects(): array
    {
        return [
            [
                'code' => 'MTH-101',
                'name' => 'Mathematics & Calculus',
                'badge' => 'STEM Core',
                'teacher' => 'Mr. D. Ndlovu',
                'teacher_email' => 'd.ndlovu@jkdesignsacademy.co.za',
                'room' => 'Room 12B & Math Studio',
                'periods_per_week' => 6,
                'credits' => 20,
                'color' => 'indigo',
                'image' => 'https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=800&q=80',
                'caption' => 'Calculus, advanced algebra, geometric proofs and data problem-solving.',
            ],
            [
                'code' => 'ENG-101',
                'name' => 'English Language & Literature',
                'badge' => 'Humanities',
                'teacher' => 'Mrs. S. Smith',
                'teacher_email' => 's.smith@jkdesignsacademy.co.za',
                'room' => 'Room 04A (Language Hub)',
                'periods_per_week' => 5,
                'credits' => 20,
                'color' => 'amber',
                'image' => 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=800&q=80',
                'caption' => 'Literary essays, world classics, rhetoric, debating and creative expression.',
            ],
            [
                'code' => 'PHY-101',
                'name' => 'Physical Sciences & Mechanics',
                'badge' => 'Natural Sciences',
                'teacher' => 'Dr. K. Mokoena',
                'teacher_email' => 'k.mokoena@jkdesignsacademy.co.za',
                'room' => 'Advanced Science Lab 1',
                'periods_per_week' => 5,
                'credits' => 20,
                'color' => 'emerald',
                'image' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80',
                'caption' => 'Newtonian mechanics, electricity, thermodynamics and chemical reactions.',
            ],
            [
                'code' => 'LIF-101',
                'name' => 'Life Sciences & Genetics',
                'badge' => 'Bio Sciences',
                'teacher' => 'Ms. R. Adams',
                'teacher_email' => 'r.adams@jkdesignsacademy.co.za',
                'room' => 'Bio-Research Lab 2',
                'periods_per_week' => 4,
                'credits' => 20,
                'color' => 'teal',
                'image' => 'https://images.unsplash.com/photo-1530497610245-94d3c16cda28?auto=format&fit=crop&w=800&q=80',
                'caption' => 'Human anatomy, cellular genetics, evolutionary biology and environmental ecology.',
            ],
            [
                'code' => 'GEO-101',
                'name' => 'Geography & Geospatial Studies',
                'badge' => 'Geosciences',
                'teacher' => 'Mr. P. Van Der Merwe',
                'teacher_email' => 'p.merwe@jkdesignsacademy.co.za',
                'room' => 'Geospatial Lab 08',
                'periods_per_week' => 4,
                'credits' => 20,
                'color' => 'sky',
                'image' => 'https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=800&q=80',
                'caption' => 'GIS mapping, climatology, topography and sustainable urban development.',
            ],
            [
                'code' => 'LIO-101',
                'name' => 'Life Orientation & Leadership',
                'badge' => 'Personal Growth',
                'teacher' => 'Mrs. T. Khumalo',
                'teacher_email' => 't.khumalo@jkdesignsacademy.co.za',
                'room' => 'Leadership Hall A',
                'periods_per_week' => 2,
                'credits' => 10,
                'color' => 'rose',
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80',
                'caption' => 'Civic leadership, ethical reasoning, wellness and career pathways.',
            ],
            [
                'code' => 'CAT-101',
                'name' => 'Computer Applications & Tech',
                'badge' => 'Digital Tech',
                'teacher' => 'Mr. J. Sithole',
                'teacher_email' => 'j.sithole@jkdesignsacademy.co.za',
                'room' => 'Innovation IT Lab 1',
                'periods_per_week' => 4,
                'credits' => 20,
                'color' => 'purple',
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=80',
                'caption' => 'Software engineering principles, web systems, databases and cyber ethics.',
            ],
        ];
    }

    /**
     * Get the student's weekly timetable with fun and bright pink & green styling.
     *
     * @return array<string, array<int, array<string, mixed>>>
     */
    protected function getTimetable(): array
    {
        return [
            'Monday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Mathematics & Calculus', 'room' => 'Room 12B', 'teacher' => 'Mr. D. Ndlovu', 'theme' => 'pink'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Physical Sciences & Mechanics', 'room' => 'Science Lab 1', 'teacher' => 'Dr. K. Mokoena', 'theme' => 'green'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval / Tea', 'room' => 'Cafeteria & Courtyard', 'teacher' => 'Duty Staff', 'theme' => 'pink'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'English Language & Literature', 'room' => 'Room 04A', 'teacher' => 'Mrs. S. Smith', 'theme' => 'green'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'Geography & Earth Systems', 'room' => 'Room 08', 'teacher' => 'Mr. P. Van Der Merwe', 'theme' => 'pink'],
                ['period' => 5, 'time' => '12:05 - 12:55', 'subject' => 'Life Sciences & Biology', 'room' => 'Bio Lab 2', 'teacher' => 'Ms. R. Adams', 'theme' => 'green'],
                ['period' => 'Lunch', 'time' => '12:55 - 13:40', 'subject' => '🍽️ Delicious Lunch Recharge', 'room' => 'Main Dining Hall', 'teacher' => 'Duty Staff', 'theme' => 'pink'],
                ['period' => 6, 'time' => '13:40 - 14:30', 'subject' => 'Computer Applications & Tech', 'room' => 'IT Lab 1', 'teacher' => 'Mr. J. Sithole', 'theme' => 'green'],
            ],
            'Tuesday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'English Language & Literature', 'room' => 'Room 04A', 'teacher' => 'Mrs. S. Smith', 'theme' => 'green'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Mathematics & Calculus', 'room' => 'Room 12B', 'teacher' => 'Mr. D. Ndlovu', 'theme' => 'pink'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Cafeteria & Courtyard', 'teacher' => 'Duty Staff', 'theme' => 'green'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Life Orientation & Wellness', 'room' => 'Hall A', 'teacher' => 'Mrs. T. Khumalo', 'theme' => 'pink'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'Physical Sciences Practical Lab', 'room' => 'Science Lab 1', 'teacher' => 'Dr. K. Mokoena', 'theme' => 'green'],
                ['period' => 5, 'time' => '12:05 - 12:55', 'subject' => 'Computer Applications & Tech', 'room' => 'IT Lab 1', 'teacher' => 'Mr. J. Sithole', 'theme' => 'pink'],
                ['period' => 'Lunch', 'time' => '12:55 - 13:40', 'subject' => '🍽️ Delicious Lunch Recharge', 'room' => 'Main Dining Hall', 'teacher' => 'Duty Staff', 'theme' => 'green'],
                ['period' => 6, 'time' => '13:40 - 14:30', 'subject' => 'Life Sciences & Biology', 'room' => 'Bio Lab 2', 'teacher' => 'Ms. R. Adams', 'theme' => 'pink'],
            ],
            'Wednesday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Physical Sciences & Mechanics', 'room' => 'Science Lab 1', 'teacher' => 'Dr. K. Mokoena', 'theme' => 'pink'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Geography & Earth Systems', 'room' => 'Room 08', 'teacher' => 'Mr. P. Van Der Merwe', 'theme' => 'green'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Cafeteria & Courtyard', 'teacher' => 'Duty Staff', 'theme' => 'pink'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Mathematics & Calculus', 'room' => 'Room 12B', 'teacher' => 'Mr. D. Ndlovu', 'theme' => 'green'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'English Language & Literature', 'room' => 'Room 04A', 'teacher' => 'Mrs. S. Smith', 'theme' => 'pink'],
                ['period' => 5, 'time' => '12:05 - 12:55', 'subject' => 'Computer Applications & Tech', 'room' => 'IT Lab 1', 'teacher' => 'Mr. J. Sithole', 'theme' => 'green'],
                ['period' => 'Lunch', 'time' => '12:55 - 13:40', 'subject' => '🍽️ Delicious Lunch Recharge', 'room' => 'Main Dining Hall', 'teacher' => 'Duty Staff', 'theme' => 'pink'],
                ['period' => 6, 'time' => '13:40 - 14:30', 'subject' => '🏆 Sports & Physical Education', 'room' => 'Sports Complex', 'teacher' => 'Coach B. Mthembu', 'theme' => 'green'],
            ],
            'Thursday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'Mathematics & Calculus', 'room' => 'Room 12B', 'teacher' => 'Mr. D. Ndlovu', 'theme' => 'green'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Life Sciences & Biology', 'room' => 'Bio Lab 2', 'teacher' => 'Ms. R. Adams', 'theme' => 'pink'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Cafeteria & Courtyard', 'teacher' => 'Duty Staff', 'theme' => 'green'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Physical Sciences & Mechanics', 'room' => 'Science Lab 1', 'teacher' => 'Dr. K. Mokoena', 'theme' => 'pink'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'English Language & Literature', 'room' => 'Room 04A', 'teacher' => 'Mrs. S. Smith', 'theme' => 'green'],
                ['period' => 5, 'time' => '12:05 - 12:55', 'subject' => 'Geography & Earth Systems', 'room' => 'Room 08', 'teacher' => 'Mr. P. Van Der Merwe', 'theme' => 'pink'],
                ['period' => 'Lunch', 'time' => '12:55 - 13:40', 'subject' => '🍽️ Delicious Lunch Recharge', 'room' => 'Main Dining Hall', 'teacher' => 'Duty Staff', 'theme' => 'green'],
                ['period' => 6, 'time' => '13:40 - 14:30', 'subject' => '💡 Academic Peer Consultation', 'room' => 'Room 12B', 'teacher' => 'Faculty Team', 'theme' => 'pink'],
            ],
            'Friday' => [
                ['period' => 1, 'time' => '08:00 - 08:50', 'subject' => 'English Language & Literature', 'room' => 'Room 04A', 'teacher' => 'Mrs. S. Smith', 'theme' => 'pink'],
                ['period' => 2, 'time' => '08:55 - 09:45', 'subject' => 'Mathematics & Calculus', 'room' => 'Room 12B', 'teacher' => 'Mr. D. Ndlovu', 'theme' => 'green'],
                ['period' => 'Break', 'time' => '09:45 - 10:15', 'subject' => '☕ Morning Interval', 'room' => 'Cafeteria & Courtyard', 'teacher' => 'Duty Staff', 'theme' => 'pink'],
                ['period' => 3, 'time' => '10:15 - 11:05', 'subject' => 'Life Orientation & Wellness', 'room' => 'Hall A', 'teacher' => 'Mrs. T. Khumalo', 'theme' => 'green'],
                ['period' => 4, 'time' => '11:10 - 12:00', 'subject' => 'Physical Sciences & Mechanics', 'room' => 'Science Lab 1', 'teacher' => 'Dr. K. Mokoena', 'theme' => 'pink'],
                ['period' => 5, 'time' => '12:05 - 12:55', 'subject' => '🏛️ School Assembly & House Spirit', 'room' => 'Main Auditorium', 'teacher' => 'Principal & Deans', 'theme' => 'green'],
            ],
        ];
    }

    /**
     * Get inviting school announcements for students.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getAnnouncements(): array
    {
        return [
            [
                'title' => '🚀 Term 1 Final Examination Timetable Published',
                'category' => 'Examinations',
                'badge_color' => 'red',
                'date' => '07 Nov 2026',
                'author' => 'Office of the Academic Dean',
                'content' => 'The official timetable for upcoming examinations has been finalized! Please review your exam rooms and arrival times. Study hard and remember: our tutors are available for extra coaching sessions daily.',
                'urgent' => true,
                'icon' => 'calendar-check',
            ],
            [
                'title' => '💡 Annual Science & Technology Innovation Fair 2026',
                'category' => 'Academic Event',
                'badge_color' => 'blue',
                'date' => '04 Nov 2026',
                'author' => 'Department of Sciences',
                'content' => 'Calling all aspiring inventors and scientists! Submissions for the J & K Designs Academy Science Fair are officially open. Great cash bursaries and medals are waiting for the winning projects.',
                'urgent' => false,
                'icon' => 'sparkles',
            ],
            [
                'title' => '🤝 Parent-Teacher Academic Progress Consultation Evening',
                'category' => 'Important Notice',
                'badge_color' => 'amber',
                'date' => '01 Nov 2026',
                'author' => 'Academy Administration',
                'content' => 'Consultations will take place on Thursday, 21 November from 16:30 to 19:30 in the Main Hall. Remind your parents and guardians to book appointment slots to celebrate your achievements!',
                'urgent' => false,
                'icon' => 'users',
            ],
            [
                'title' => '🏆 Inter-House Athletics and Championship Tournament',
                'category' => 'Sports & Culture',
                'badge_color' => 'emerald',
                'date' => '28 Oct 2026',
                'author' => 'Sports Department',
                'content' => 'Get ready to cheer your house! The official inter-house roster, mascot competition, and spectator bandanas will be available this Friday. Let your house spirit shine brightly!',
                'urgent' => false,
                'icon' => 'trophy',
            ],
        ];
    }

    /**
     * Get upcoming examinations schedule with target timestamps for countdown.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getUpcomingExams(): array
    {
        return [
            [
                'subject' => 'Mathematics',
                'paper' => 'Paper 1 (Algebra, Equations & Calculus)',
                'date' => '18 Nov 2026',
                'target_iso' => '2026-11-18T09:00:00',
                'time' => '09:00 - 11:30',
                'duration' => '2h 30m',
                'venue' => 'Main Examination Hall',
                'seat' => 'Seat M-24',
                'status' => 'Upcoming',
                'urgency' => 'high',
                'badge_color' => 'indigo',
            ],
            [
                'subject' => 'English (Home Language)',
                'paper' => 'Paper 1 (Language in Context & Comprehension)',
                'date' => '20 Nov 2026',
                'target_iso' => '2026-11-20T09:00:00',
                'time' => '09:00 - 11:00',
                'duration' => '2h 00m',
                'venue' => 'Room 102 & 104',
                'seat' => 'Seat E-12',
                'status' => 'Upcoming',
                'urgency' => 'medium',
                'badge_color' => 'amber',
            ],
            [
                'subject' => 'Physical Sciences',
                'paper' => 'Paper 1 (Physics Mechanics & Electricity)',
                'date' => '24 Nov 2026',
                'target_iso' => '2026-11-24T09:00:00',
                'time' => '09:00 - 12:00',
                'duration' => '3h 00m',
                'venue' => 'Science Wing Auditorium',
                'seat' => 'Seat P-15',
                'status' => 'Upcoming',
                'urgency' => 'medium',
                'badge_color' => 'emerald',
            ],
            [
                'subject' => 'Life Sciences',
                'paper' => 'Paper 1 (Genetics & Cellular Biology)',
                'date' => '27 Nov 2026',
                'target_iso' => '2026-11-27T09:00:00',
                'time' => '09:00 - 11:30',
                'duration' => '2h 30m',
                'venue' => 'Hall B',
                'seat' => 'Seat L-08',
                'status' => 'Upcoming',
                'urgency' => 'normal',
                'badge_color' => 'teal',
            ],
            [
                'subject' => 'Geography',
                'paper' => 'Paper 1 (Climatology & Mapwork)',
                'date' => '01 Dec 2026',
                'target_iso' => '2026-12-01T09:00:00',
                'time' => '09:00 - 11:30',
                'duration' => '2h 30m',
                'venue' => 'Room 08 & 09',
                'seat' => 'Seat G-19',
                'status' => 'Upcoming',
                'urgency' => 'normal',
                'badge_color' => 'sky',
            ],
        ];
    }

    /**
     * Get attendance summary and recent records.
     *
     * @return array<string, mixed>
     */
    protected function getAttendance(): array
    {
        return [
            'rate' => 97.4,
            'days_present' => 75,
            'days_absent' => 2,
            'days_late' => 1,
            'total_days' => 78,
            'standing' => 'Excellent Standing',
            'recent_records' => [
                ['date' => '07 Nov 2026', 'day' => 'Friday', 'status' => 'Present', 'check_in' => '07:48 AM', 'remarks' => 'On time, full attendance'],
                ['date' => '06 Nov 2026', 'day' => 'Thursday', 'status' => 'Present', 'check_in' => '07:52 AM', 'remarks' => 'On time, full attendance'],
                ['date' => '05 Nov 2026', 'day' => 'Wednesday', 'status' => 'Present', 'check_in' => '07:45 AM', 'remarks' => 'On time, full attendance'],
                ['date' => '04 Nov 2026', 'day' => 'Tuesday', 'status' => 'Late', 'check_in' => '08:08 AM', 'remarks' => 'Traffic delay (Parent note signed)'],
                ['date' => '03 Nov 2026', 'day' => 'Monday', 'status' => 'Present', 'check_in' => '07:50 AM', 'remarks' => 'On time, full attendance'],
                ['date' => '31 Oct 2026', 'day' => 'Friday', 'status' => 'Present', 'check_in' => '07:44 AM', 'remarks' => 'On time, full attendance'],
                ['date' => '30 Oct 2026', 'day' => 'Thursday', 'status' => 'Excused', 'check_in' => '—', 'remarks' => 'Medical appointment (Doctor note verified)'],
                ['date' => '29 Oct 2026', 'day' => 'Wednesday', 'status' => 'Present', 'check_in' => '07:51 AM', 'remarks' => 'On time, full attendance'],
            ],
        ];
    }
}
