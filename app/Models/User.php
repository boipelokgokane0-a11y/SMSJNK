<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable([
    'name',
    'role',
    'first_name',
    'surname',
    'email',
    'dob',
    'gender',
    'ethnicity',
    'id_number',
    'passport',
    'marital_status',
    'address',
    'parent_name',
    'parent_contact',
    'parent_email',
    'contact_number',
    'school',
    'grade',
    'student_number',
    'class_allocation',
    'account_status',
    'academic_year',
    'percel_number',
    'qualifications_document',
    'subject_to_be_taught',
    'next_of_kin_name',
    'next_of_kin_relationship',
    'next_of_kin_contact',
    'password',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'dob' => 'date',
        ];
    }

    /**
     * Accessor for student_number with automatic fallback.
     */
    protected function studentNumber(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ?: ($this->isStudent() ? 'STU-2026-'.str_pad((string) ($this->id ?: 1), 4, '0', STR_PAD_LEFT) : null),
            set: fn (?string $value) => $value,
        );
    }

    /**
     * Accessor for class_allocation with automatic fallback.
     */
    protected function classAllocation(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ?: ($this->isStudent() ? ($this->grade ? $this->grade.' - Class A' : 'Grade 10 - Class A') : null),
            set: fn (?string $value) => $value,
        );
    }

    /**
     * Accessor for account_status with automatic fallback.
     */
    protected function accountStatus(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ?: 'Active',
            set: fn (?string $value) => $value,
        );
    }

    /**
     * Accessor for academic_year with automatic fallback.
     */
    protected function academicYear(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ?: '2026/2027',
            set: fn (?string $value) => $value,
        );
    }

    /**
     * Determine if the user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin' || $this->hasRole('admin');
    }

    /**
     * Determine if the user is a teacher.
     */
    public function isTeacher(): bool
    {
        return $this->role === 'teacher' || $this->hasRole('teacher');
    }

    /**
     * Determine if the user is a student.
     */
    public function isStudent(): bool
    {
        return $this->role === 'student' || $this->hasRole('student');
    }
}
