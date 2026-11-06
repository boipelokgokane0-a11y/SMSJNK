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

        return view('dashboard.teacher', compact('user'));
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
}
