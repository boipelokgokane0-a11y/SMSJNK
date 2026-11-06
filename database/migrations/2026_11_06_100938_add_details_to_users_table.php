<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('student')->after('name'); // admin, teacher, student
            $table->string('first_name')->nullable()->after('role');
            $table->string('surname')->nullable()->after('first_name');
            $table->date('dob')->nullable()->after('surname');
            $table->string('gender')->nullable()->after('dob');
            $table->string('ethnicity')->nullable()->after('gender');
            $table->string('id_number')->nullable()->after('ethnicity');
            $table->string('passport')->nullable()->after('id_number');
            $table->string('marital_status')->nullable()->after('passport');
            $table->text('address')->nullable()->after('marital_status');
            $table->string('contact_number')->nullable()->after('address');
            $table->string('school')->nullable()->after('contact_number');

            // Student specific
            $table->string('grade')->nullable()->after('school');

            // Teacher specific
            $table->string('percel_number')->nullable()->after('grade');
            $table->string('qualifications_document')->nullable()->after('percel_number');
            $table->string('subject_to_be_taught')->nullable()->after('qualifications_document');

            // Next of kin details
            $table->string('next_of_kin_name')->nullable()->after('subject_to_be_taught');
            $table->string('next_of_kin_relationship')->nullable()->after('next_of_kin_name');
            $table->string('next_of_kin_contact')->nullable()->after('next_of_kin_relationship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'first_name',
                'surname',
                'dob',
                'gender',
                'ethnicity',
                'id_number',
                'passport',
                'marital_status',
                'address',
                'contact_number',
                'school',
                'grade',
                'percel_number',
                'qualifications_document',
                'subject_to_be_taught',
                'next_of_kin_name',
                'next_of_kin_relationship',
                'next_of_kin_contact',
            ]);
        });
    }
};
