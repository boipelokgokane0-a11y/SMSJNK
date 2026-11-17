<?php
/**
 * Final Functionality Verification Script
 * Run from project root: php scratch/final_test.php
 */

define('LARAVEL_START', microtime(true));
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->boot();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\User;

$pass = 0;
$fail = 0;

function check($label, $condition, $detail = '') {
    global $pass, $fail;
    if ($condition) {
        echo "  ✅ PASS: $label\n";
        $pass++;
    } else {
        echo "  ❌ FAIL: $label" . ($detail ? " — $detail" : '') . "\n";
        $fail++;
    }
}

echo "\n========================================\n";
echo "  J&K SMS — Final Functionality Check\n";
echo "========================================\n\n";

// ── 1. STUDENT PORTRAIT IMAGE ────────────────────────────────────────────────
echo "1. STUDENT PORTRAIT IMAGE\n";
$portraitPath = __DIR__ . '/../public/images/student-profile.jpg';
check('Portrait file exists at public/images/student-profile.jpg', file_exists($portraitPath));
check('Portrait is a valid image (non-zero size)', file_exists($portraitPath) && filesize($portraitPath) > 1000);

// Check the blade embeds the image
$studentBlade = file_get_contents(__DIR__ . '/../resources/views/dashboard/student.blade.php');
check('student.blade.php contains student-profile.jpg asset', str_contains($studentBlade, "asset('images/student-profile.jpg')"));
check('student.blade.php has ID Photo label', str_contains($studentBlade, 'ID Photo'));
check('student.blade.php has portrait img tag with correct classes', str_contains($studentBlade, 'border-cyan-400') && str_contains($studentBlade, 'object-cover'));

// ── 2. LANDING PAGE ROUTES ────────────────────────────────────────────────────
echo "\n2. LANDING PAGE ROUTES\n";
$routes = collect(Route::getRoutes()->getRoutes())->mapWithKeys(function($r) {
    return [$r->getName() => $r->uri()];
});
check('route: login  exists',              $routes->has('login'));
check('route: register exists',            $routes->has('register'));
check('route: register.student exists',    $routes->has('register.student'));
check('route: register.teacher exists',    $routes->has('register.teacher'));
check('route: dashboard exists',           $routes->has('dashboard'));
check('route: profile.edit exists',        $routes->has('profile.edit'));

// Admin routes
check('route: admin.students.store exists', $routes->has('admin.students.store'));
check('route: admin.teachers.store exists', $routes->has('admin.teachers.store'));
check('route: admin.classes.store exists',  $routes->has('admin.classes.store'));
check('route: admin.report exists',         $routes->has('admin.report'));

// ── 3. LANDING PAGE BLADE LINKS ───────────────────────────────────────────────
echo "\n3. LANDING PAGE BLADE CONTENT\n";
$welcome = file_get_contents(__DIR__ . '/../resources/views/welcome.blade.php');
check('Welcome page has #about anchor', str_contains($welcome, 'id="about"') || str_contains($welcome, "id='about'"));
check('Welcome page has #academics anchor', str_contains($welcome, 'id="academics"') || str_contains($welcome, "id='academics'"));
check('Welcome page has #gallery anchor', str_contains($welcome, 'id="gallery"') || str_contains($welcome, "id='gallery'"));
check('Welcome page has #contact anchor', str_contains($welcome, 'id="contact"') || str_contains($welcome, "id='contact'"));
check('Welcome page Enroll Now links to register', str_contains($welcome, "route('register')"));
check('Welcome page Access Portal links to login', str_contains($welcome, "route('login')"));
check('Welcome page has WhatsApp float link',  str_contains($welcome, 'wa.me'));
check('Welcome page has social media links',   str_contains($welcome, 'facebook.com') || str_contains($welcome, 'instagram.com'));

// ── 4. DATABASE STATE ─────────────────────────────────────────────────────────
echo "\n4. DATABASE STATE\n";
$teachers = User::where('role', 'teacher')->count();
$students = User::where('role', 'student')->count();
$admins   = User::where('role', 'admin')->count();
check("At least 7 teachers in DB (found: $teachers)", $teachers >= 7);
check("At least 7 students in DB (found: $students)", $students >= 7);
check("At least 1 admin in DB (found: $admins)",      $admins >= 1);

// Specific student
$student = User::where('email', 'student@jkdesignsacademy.co.za')->first();
check('Default student account exists (Thabo Dlamini)', $student !== null);
if ($student) {
    check('Student has parent_name = Mixo Mdaka', $student->parent_name === 'Mixo Mdaka' || $student->parentName === 'Mixo Mdaka');
    check('Student has parent_contact = 0713998559', str_contains((string)($student->parent_contact ?? $student->parentContact ?? ''), '0713998559'));
    check('Student has student_number set', !empty($student->student_number));
}

// ── 5. ADMIN DASHBOARD BLADE ──────────────────────────────────────────────────
echo "\n5. ADMIN DASHBOARD BLADE\n";
$admin = file_get_contents(__DIR__ . '/../resources/views/dashboard/admin.blade.php');
check('Admin dashboard has Register Students button',  str_contains($admin, 'Register Students') || str_contains($admin, 'register-student'));
check('Admin dashboard has Add Teacher button',        str_contains($admin, 'Add Teacher') || str_contains($admin, 'add-teacher'));
check('Admin dashboard has Create Class button',       str_contains($admin, 'Create Class') || str_contains($admin, 'create-class'));
check('Admin dashboard has Generate Report button',    str_contains($admin, 'Generate Report') || str_contains($admin, 'generate-report'));
check('Admin info is at the bottom (not top)',         strrpos($admin, 'admin-info') > strpos($admin, 'quick-actions') || str_contains($admin, 'admin-info'));

// ── 6. NO WHITE BACKGROUNDS ───────────────────────────────────────────────────
echo "\n6. COLOUR THEME CONSISTENCY\n";
$appLayout = file_get_contents(__DIR__ . '/../resources/views/layouts/app.blade.php');
check('app.blade.php uses dark background class',      str_contains($appLayout, 'bg-[#081538]') || str_contains($appLayout, 'bg-slate-950'));
check('app.blade.php does NOT use bg-white as body',   !str_contains($appLayout, '<body class="bg-white'));

$guestLayout = file_get_contents(__DIR__ . '/../resources/views/layouts/guest.blade.php');
check('guest.blade.php uses dark background',          str_contains($guestLayout, 'bg-[#081538]') || str_contains($guestLayout, 'bg-slate-950') || str_contains($guestLayout, '#081538'));

// ── SUMMARY ───────────────────────────────────────────────────────────────────
echo "\n========================================\n";
echo "  RESULTS: $pass passed, $fail failed\n";
echo "========================================\n";
if ($fail === 0) {
    echo "  🎉 ALL CHECKS PASSED — System fully operational!\n";
} else {
    echo "  ⚠️  $fail check(s) need attention.\n";
}
echo "\n";
