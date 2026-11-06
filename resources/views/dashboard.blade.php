@php
    $user = auth()->user();
    if ($user && $user->isAdmin()) {
        $totalStudents = \App\Models\User::where('role', 'student')->count();
        $totalTeachers = \App\Models\User::where('role', 'teacher')->count();
        $totalUsers = \App\Models\User::count();
        $recentStudents = \App\Models\User::where('role', 'student')->latest()->take(6)->get();
        $recentTeachers = \App\Models\User::where('role', 'teacher')->latest()->take(6)->get();
    }
@endphp

@if ($user && $user->isAdmin())
    @include('dashboard.admin', compact('user', 'totalStudents', 'totalTeachers', 'totalUsers', 'recentStudents', 'recentTeachers'))
@elseif ($user && $user->isTeacher())
    @include('dashboard.teacher', compact('user'))
@else
    @include('dashboard.student', compact('user'))
@endif
