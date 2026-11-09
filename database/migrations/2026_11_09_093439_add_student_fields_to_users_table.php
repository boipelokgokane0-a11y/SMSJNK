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
            $table->string('student_number')->nullable()->unique()->after('grade');
            $table->string('class_allocation')->nullable()->after('student_number');
            $table->string('account_status')->nullable()->default('Active')->after('class_allocation');
            $table->string('academic_year')->nullable()->default('2026/2027')->after('account_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'student_number',
                'class_allocation',
                'account_status',
                'academic_year',
            ]);
        });
    }
};
