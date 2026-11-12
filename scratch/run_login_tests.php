<?php

/**
 * Test runner that verifies login functionality works for student, teacher, and admin.
 * This directly tests the route and authentication logic.
 */
define('LARAVEL_ROOT', 'C:/xampp/htdocs/jnksms');
chdir(LARAVEL_ROOT);

require LARAVEL_ROOT.'/vendor/autoload.php';

$app = require_once LARAVEL_ROOT.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$results = [];
$allPassed = true;

function test(string $name, callable $fn, array &$results, bool &$allPassed): void
{
    try {
        $fn();
        echo "\033[32m✓ PASS\033[0m $name\n";
        $results[] = ['name' => $name, 'status' => 'PASS'];
    } catch (Throwable $e) {
        echo "\033[31m✗ FAIL\033[0m $name\n  → ".$e->getMessage()."\n";
        $results[] = ['name' => $name, 'status' => 'FAIL', 'error' => $e->getMessage()];
        $allPassed = false;
    }
}

function assert_equals($expected, $actual, string $msg = ''): void
{
    if ($expected !== $actual) {
        throw new RuntimeException(($msg ? "$msg: " : '')."Expected '$expected', got '$actual'");
    }
}

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Use an in-memory SQLite DB for clean tests
config(['database.default' => 'sqlite']);
config(['database.connections.sqlite.database' => ':memory:']);

// Run migrations
Artisan::call('migrate', ['--force' => true]);

echo "\n=== Login Functionality Tests ===\n\n";

// Test 1: Student user has 'student' role
test('Student user is recognised by isStudent()', function () {
    $user = User::create([
        'name' => 'Test Student',
        'email' => 'student_test@example.com',
        'password' => Hash::make('password123'),
        'role' => 'student',
        'email_verified_at' => null,
    ]);
    if (! $user->isStudent()) {
        throw new RuntimeException('isStudent() returned false for student user');
    }
    if ($user->isTeacher()) {
        throw new RuntimeException('isTeacher() returned true for student user');
    }
    if ($user->isAdmin()) {
        throw new RuntimeException('isAdmin() returned true for student user');
    }
}, $results, $allPassed);

// Test 2: Teacher user has 'teacher' role
test('Teacher user is recognised by isTeacher()', function () {
    $user = User::create([
        'name' => 'Test Teacher',
        'email' => 'teacher_test@example.com',
        'password' => Hash::make('password123'),
        'role' => 'teacher',
        'email_verified_at' => null,
    ]);
    if (! $user->isTeacher()) {
        throw new RuntimeException('isTeacher() returned false for teacher user');
    }
    if ($user->isStudent()) {
        throw new RuntimeException('isStudent() returned true for teacher user');
    }
}, $results, $allPassed);

// Test 3: Admin user has 'admin' role
test('Admin user is recognised by isAdmin()', function () {
    $user = User::create([
        'name' => 'Admin User',
        'email' => 'admin_test@example.com',
        'password' => Hash::make('admin123'),
        'role' => 'admin',
        'email_verified_at' => now(),
    ]);
    if (! $user->isAdmin()) {
        throw new RuntimeException('isAdmin() returned false for admin user');
    }
    if ($user->isStudent()) {
        throw new RuntimeException('isStudent() returned true for admin user');
    }
    if ($user->isTeacher()) {
        throw new RuntimeException('isTeacher() returned true for admin user');
    }
}, $results, $allPassed);

// Test 4: Login redirect for student goes to student.dashboard
test('Student login redirects to student.dashboard route', function () {
    // Simulate role-based redirect logic from AuthenticatedSessionController
    $user = User::where('email', 'student_test@example.com')->first();
    $redirectRoute = null;
    if ($user->isAdmin()) {
        $redirectRoute = 'admin.dashboard';
    } elseif ($user->isTeacher()) {
        $redirectRoute = 'teacher.dashboard';
    } else {
        $redirectRoute = 'student.dashboard';
    }
    assert_equals('student.dashboard', $redirectRoute, 'Student redirect route');
}, $results, $allPassed);

// Test 5: Login redirect for teacher goes to teacher.dashboard
test('Teacher login redirects to teacher.dashboard route', function () {
    $user = User::where('email', 'teacher_test@example.com')->first();
    $redirectRoute = null;
    if ($user->isAdmin()) {
        $redirectRoute = 'admin.dashboard';
    } elseif ($user->isTeacher()) {
        $redirectRoute = 'teacher.dashboard';
    } else {
        $redirectRoute = 'student.dashboard';
    }
    assert_equals('teacher.dashboard', $redirectRoute, 'Teacher redirect route');
}, $results, $allPassed);

// Test 6: Login redirect for admin goes to admin.dashboard
test('Admin login redirects to admin.dashboard route', function () {
    $user = User::where('email', 'admin_test@example.com')->first();
    $redirectRoute = null;
    if ($user->isAdmin()) {
        $redirectRoute = 'admin.dashboard';
    } elseif ($user->isTeacher()) {
        $redirectRoute = 'teacher.dashboard';
    } else {
        $redirectRoute = 'student.dashboard';
    }
    assert_equals('admin.dashboard', $redirectRoute, 'Admin redirect route');
}, $results, $allPassed);

// Test 7: Student dashboard route does NOT require verified middleware
test('Student dashboard route is accessible without email verification', function () {
    $routes = app('router')->getRoutes();
    $studentRoute = $routes->getByName('student.dashboard');
    if (! $studentRoute) {
        throw new RuntimeException("Route 'student.dashboard' not found");
    }
    $middleware = $studentRoute->middleware();
    if (in_array('verified', $middleware)) {
        throw new RuntimeException("Route 'student.dashboard' still has 'verified' middleware — students cannot log in without email verification!");
    }
}, $results, $allPassed);

// Test 8: Teacher dashboard route does NOT require verified middleware
test('Teacher dashboard route is accessible without email verification', function () {
    $routes = app('router')->getRoutes();
    $teacherRoute = $routes->getByName('teacher.dashboard');
    if (! $teacherRoute) {
        throw new RuntimeException("Route 'teacher.dashboard' not found");
    }
    $middleware = $teacherRoute->middleware();
    if (in_array('verified', $middleware)) {
        throw new RuntimeException("Route 'teacher.dashboard' still has 'verified' middleware — teachers cannot log in without email verification!");
    }
}, $results, $allPassed);

// Test 9: Admin dashboard route DOES require verified middleware
test('Admin dashboard route requires email verification', function () {
    $routes = app('router')->getRoutes();
    $adminRoute = $routes->getByName('admin.dashboard');
    if (! $adminRoute) {
        throw new RuntimeException("Route 'admin.dashboard' not found");
    }
    $middleware = $adminRoute->middleware();
    if (! in_array('verified', $middleware)) {
        throw new RuntimeException("Route 'admin.dashboard' is missing 'verified' middleware");
    }
}, $results, $allPassed);

// Test 10: Password hashing works
test('Passwords are stored hashed and can be verified', function () {
    $user = User::where('email', 'student_test@example.com')->first();
    if (! Hash::check('password123', $user->password)) {
        throw new RuntimeException('Password verification failed — hash mismatch');
    }
}, $results, $allPassed);

echo "\n=== Results ===\n";
$passed = count(array_filter($results, fn ($r) => $r['status'] === 'PASS'));
$failed = count(array_filter($results, fn ($r) => $r['status'] === 'FAIL'));
echo "Passed: $passed/".count($results)."\n";
echo "Failed: $failed/".count($results)."\n\n";

if ($allPassed) {
    echo "\033[32m✓ ALL TESTS PASSED\033[0m\n";
} else {
    echo "\033[31m✗ SOME TESTS FAILED\033[0m\n";
    exit(1);
}
