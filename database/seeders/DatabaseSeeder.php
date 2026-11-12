<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Spatie Roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'web']);
        $studentRole = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);

        // 2. Administrators
        $admins = [
            [
                'email' => 'admin@jkdesignsacademy.co.za',
                'name' => 'J & K Designs Administrator',
                'first_name' => 'System',
                'surname' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'contact_number' => '0800123456',
                'address' => '45 Brooklyn Street, Pretoria',
                'account_status' => 'Active',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'admin@admin.com',
                'name' => 'System Administrator',
                'first_name' => 'System',
                'surname' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'contact_number' => '0123456789',
                'address' => 'Administrative Office',
                'account_status' => 'Active',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'admin@jnkdesignsacademy.co.za',
                'name' => 'Jand K Design Academy Admin',
                'first_name' => 'Jand',
                'surname' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'contact_number' => '0800123456',
                'address' => '45 Brooklyn Street, Pretoria',
                'account_status' => 'Active',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($admins as $data) {
            $user = User::updateOrCreate(['email' => $data['email']], $data);
            if (! $user->hasRole('admin')) {
                $user->assignRole($adminRole);
            }
        }

        // 3. Teachers
        $teachers = [
            [
                'email' => 'teacher@jkdesignsacademy.co.za',
                'name' => 'Sarah Jenkins',
                'first_name' => 'Sarah',
                'surname' => 'Jenkins',
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'dob' => '1988-03-20',
                'gender' => 'Female',
                'ethnicity' => 'Other',
                'id_number' => '8803201234089',
                'marital_status' => 'Married',
                'address' => '45 Brooklyn Street, Pretoria',
                'contact_number' => '0834567890',
                'school' => 'J & K Designs Academy',
                'percel_number' => 'PER-8899',
                'subject_to_be_taught' => 'Mathematics',
                'next_of_kin_name' => 'David Jenkins',
                'next_of_kin_relationship' => 'Spouse',
                'next_of_kin_contact' => '0845678901',
                'account_status' => 'Active',
                'academic_year' => '2026/2027',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'teacher@example.com',
                'name' => 'Michael Ndlovu',
                'first_name' => 'Michael',
                'surname' => 'Ndlovu',
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'dob' => '1985-07-14',
                'gender' => 'Male',
                'ethnicity' => 'African',
                'id_number' => '8507141234089',
                'marital_status' => 'Single',
                'address' => '78 Church Street, Pretoria',
                'contact_number' => '0823456781',
                'school' => 'J & K Designs Academy',
                'percel_number' => 'PER-7722',
                'subject_to_be_taught' => 'Physical Sciences',
                'next_of_kin_name' => 'Sipho Ndlovu',
                'next_of_kin_relationship' => 'Brother',
                'next_of_kin_contact' => '0833456782',
                'account_status' => 'Active',
                'academic_year' => '2026/2027',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'teacher@jnkdesignsacademy.co.za',
                'name' => 'Grace Mokoena',
                'first_name' => 'Grace',
                'surname' => 'Mokoena',
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'dob' => '1990-11-05',
                'gender' => 'Female',
                'ethnicity' => 'African',
                'id_number' => '9011051234089',
                'marital_status' => 'Single',
                'address' => '12 Paul Kruger Street, Pretoria',
                'contact_number' => '0813456783',
                'school' => 'J & K Designs Academy',
                'percel_number' => 'PER-6633',
                'subject_to_be_taught' => 'English',
                'next_of_kin_name' => 'Lindiwe Mokoena',
                'next_of_kin_relationship' => 'Mother',
                'next_of_kin_contact' => '0843456784',
                'account_status' => 'Active',
                'academic_year' => '2026/2027',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($teachers as $data) {
            $user = User::updateOrCreate(['email' => $data['email']], $data);
            if (! $user->hasRole('teacher')) {
                $user->assignRole($teacherRole);
            }
        }

        // 4. Students / Learners
        $students = [
            [
                'email' => 'student@jkdesignsacademy.co.za',
                'name' => 'Thabo Dlamini',
                'first_name' => 'Thabo',
                'surname' => 'Dlamini',
                'password' => Hash::make('password'),
                'role' => 'student',
                'dob' => '2008-05-15',
                'gender' => 'Male',
                'ethnicity' => 'African',
                'id_number' => '0805151234089',
                'marital_status' => 'Single',
                'address' => '123 Academy Lane, Pretoria',
                'contact_number' => '0812345678',
                'school' => 'J & K Designs Academy',
                'grade' => 'Grade 10',
                'student_number' => 'STU-2026-0001',
                'class_allocation' => 'Grade 10 - Class A',
                'account_status' => 'Active',
                'academic_year' => '2026/2027',
                'next_of_kin_name' => 'Jane Dlamini',
                'next_of_kin_relationship' => 'Mother',
                'next_of_kin_contact' => '0823456789',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'learner@jkdesignsacademy.co.za',
                'name' => 'Zanele Khumalo',
                'first_name' => 'Zanele',
                'surname' => 'Khumalo',
                'password' => Hash::make('password'),
                'role' => 'student',
                'dob' => '2007-09-22',
                'gender' => 'Female',
                'ethnicity' => 'African',
                'id_number' => '0709221234089',
                'marital_status' => 'Single',
                'address' => '56 Francis Baard Street, Pretoria',
                'contact_number' => '0823456799',
                'school' => 'J & K Designs Academy',
                'grade' => 'Grade 11',
                'student_number' => 'STU-2026-0002',
                'class_allocation' => 'Grade 11 - Class A',
                'account_status' => 'Active',
                'academic_year' => '2026/2027',
                'next_of_kin_name' => 'Siphiwe Khumalo',
                'next_of_kin_relationship' => 'Father',
                'next_of_kin_contact' => '0833456790',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'student@example.com',
                'name' => 'Liam Smith',
                'first_name' => 'Liam',
                'surname' => 'Smith',
                'password' => Hash::make('password'),
                'role' => 'student',
                'dob' => '2006-02-18',
                'gender' => 'Male',
                'ethnicity' => 'Other',
                'id_number' => '0602181234089',
                'marital_status' => 'Single',
                'address' => '89 Burnett Street, Hatfield, Pretoria',
                'contact_number' => '0833456701',
                'school' => 'J & K Designs Academy',
                'grade' => 'Grade 12',
                'student_number' => 'STU-2026-0003',
                'class_allocation' => 'Grade 12 - Class A',
                'account_status' => 'Active',
                'academic_year' => '2026/2027',
                'next_of_kin_name' => 'Emma Smith',
                'next_of_kin_relationship' => 'Mother',
                'next_of_kin_contact' => '0843456702',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($students as $data) {
            $user = User::updateOrCreate(['email' => $data['email']], $data);
            if (! $user->hasRole('student')) {
                $user->assignRole($studentRole);
            }
        }
    }
}
