<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration choice view (student or teacher).
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Display the student registration view.
     */
    public function createStudent(): View
    {
        return view('auth.register-student');
    }

    /**
     * Display the teacher registration view.
     */
    public function createTeacher(): View
    {
        return view('auth.register-teacher');
    }

    /**
     * Handle incoming student registration request.
     */
    public function storeStudent(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:50'],
            'ethnicity' => ['required', 'string', 'max:100'],
            'id_number' => ['nullable', 'string', 'max:50'],
            'passport' => ['nullable', 'string', 'max:50'],
            'marital_status' => ['required', 'string', 'max:50'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:1000'],
            'contact_number' => ['required', 'string', 'max:50'],
            'grade' => ['required', 'string', 'max:100'],
            'next_of_kin_name' => ['required', 'string', 'max:255'],
            'next_of_kin_relationship' => ['required', 'string', 'max:100'],
            'next_of_kin_contact' => ['required', 'string', 'max:50'],
            'school' => ['required', 'string', 'max:255'],
        ]);

        $fullName = trim($request->first_name . ' ' . $request->surname);

        $user = User::create([
            'name' => $fullName,
            'role' => 'student',
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'ethnicity' => $request->ethnicity,
            'id_number' => $request->id_number,
            'passport' => $request->passport,
            'marital_status' => $request->marital_status,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'grade' => $request->grade,
            'school' => $request->school,
            'next_of_kin_name' => $request->next_of_kin_name,
            'next_of_kin_relationship' => $request->next_of_kin_relationship,
            'next_of_kin_contact' => $request->next_of_kin_contact,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('student');

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('student.dashboard');
    }

    /**
     * Handle incoming teacher registration request.
     */
    public function storeTeacher(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:50'],
            'ethnicity' => ['required', 'string', 'max:100'],
            'id_number' => ['nullable', 'string', 'max:50'],
            'passport' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'percel_number' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:1000'],
            'marital_status' => ['required', 'string', 'max:50'],
            'qualifications_document' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip', 'max:10240'],
            'contact_number' => ['required', 'string', 'max:50'],
            'subject_to_be_taught' => ['required', 'string', 'max:255'],
            'next_of_kin_name' => ['required', 'string', 'max:255'],
            'next_of_kin_relationship' => ['required', 'string', 'max:100'],
            'next_of_kin_contact' => ['required', 'string', 'max:50'],
            'school' => ['required', 'string', 'max:255'],
        ]);

        $docPath = null;
        if ($request->hasFile('qualifications_document')) {
            $docPath = $request->file('qualifications_document')->store('qualifications', 'public');
        }

        $fullName = trim($request->first_name . ' ' . $request->surname);

        $user = User::create([
            'name' => $fullName,
            'role' => 'teacher',
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'ethnicity' => $request->ethnicity,
            'id_number' => $request->id_number,
            'passport' => $request->passport,
            'password' => Hash::make($request->password),
            'percel_number' => $request->percel_number,
            'address' => $request->address,
            'marital_status' => $request->marital_status,
            'qualifications_document' => $docPath,
            'contact_number' => $request->contact_number,
            'subject_to_be_taught' => $request->subject_to_be_taught,
            'next_of_kin_name' => $request->next_of_kin_name,
            'next_of_kin_relationship' => $request->next_of_kin_relationship,
            'next_of_kin_contact' => $request->next_of_kin_contact,
            'school' => $request->school,
        ]);

        $user->assignRole('teacher');

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('teacher.dashboard');
    }

    /**
     * Dispatch general register form submission.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->input('role') === 'teacher') {
            return $this->storeTeacher($request);
        }

        return $this->storeStudent($request);
    }
}
