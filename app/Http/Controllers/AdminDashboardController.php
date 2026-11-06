<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the Admin Welcome Dashboard.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if (!$user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalUsers = User::count();

        $recentStudents = User::where('role', 'student')
            ->latest()
            ->take(6)
            ->get();

        $recentTeachers = User::where('role', 'teacher')
            ->latest()
            ->take(6)
            ->get();

        return view('dashboard.admin', compact(
            'user',
            'totalStudents',
            'totalTeachers',
            'totalUsers',
            'recentStudents',
            'recentTeachers'
        ));
    }
}
