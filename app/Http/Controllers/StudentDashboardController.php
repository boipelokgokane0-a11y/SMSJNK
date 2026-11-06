<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentDashboardController extends Controller
{
    /**
     * Display the Student Welcome Dashboard.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if (!$user->isStudent() && !$user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        return view('dashboard.student', compact('user'));
    }
}
