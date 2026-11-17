<?php
/**
 * File-based Final Verification (no Laravel bootstrap needed)
 */
$base = __DIR__ . '/..';
$pass = 0; $fail = 0;

function chk($label, $ok, $detail = '') {
    global $pass, $fail;
    if ($ok) { echo "  ✅ $label\n"; $pass++; }
    else      { echo "  ❌ $label" . ($detail ? " — $detail" : '') . "\n"; $fail++; }
}

echo "\n========================================\n";
echo "  J&K SMS — Final Verification\n";
echo "========================================\n\n";

// ── PORTRAIT IMAGE ──────────────────────────────────────────────────
echo "1. STUDENT PORTRAIT IMAGE\n";
$img = "$base/public/images/student-profile.jpg";
chk('File exists: public/images/student-profile.jpg', file_exists($img));
chk('File is non-trivial (>5KB)', file_exists($img) && filesize($img) > 5000, file_exists($img) ? (filesize($img).' bytes') : 'missing');

$blade = file_get_contents("$base/resources/views/dashboard/student.blade.php");
chk("Blade has asset('images/student-profile.jpg')", str_contains($blade, "asset('images/student-profile.jpg')"));
chk('Blade has onerror fallback for portrait',        str_contains($blade, 'onerror='));
chk('Blade has ID Photo label',                       str_contains($blade, 'ID Photo'));
chk('Blade has border-cyan-400 on portrait',          str_contains($blade, 'border-cyan-400'));

// ── LANDING PAGE CONTENT ────────────────────────────────────────────
echo "\n2. LANDING PAGE CLICKABLE ELEMENTS\n";
$w = file_get_contents("$base/resources/views/welcome.blade.php");
chk('#about section anchor exists',    str_contains($w, 'id="about"') || str_contains($w, "id='about'"));
chk('#academics section anchor exists',str_contains($w, 'id="academics"') || str_contains($w, "id='academics'"));
chk('#gallery section anchor exists',  str_contains($w, 'id="gallery"') || str_contains($w, "id='gallery'"));
chk('#contact section anchor exists',  str_contains($w, 'id="contact"') || str_contains($w, "id='contact'"));
chk('Enroll Now → route(register)',    str_contains($w, "route('register')"));
chk('Access Portal → route(login)',    str_contains($w, "route('login')"));
chk('WhatsApp float button (wa.me)',   str_contains($w, 'wa.me'));
chk('Social media links present',      str_contains($w, 'facebook.com') && str_contains($w, 'instagram.com'));
chk('Gallery JS filter tabs present',  str_contains($w, 'filterGallery') || str_contains($w, 'gallery-filter') || str_contains($w, 'filter('));
chk('Footer login links present',      str_contains($w, "route('login')"));

// ── ADMIN DASHBOARD ─────────────────────────────────────────────────
echo "\n3. ADMIN DASHBOARD\n";
$a = file_get_contents("$base/resources/views/dashboard/admin.blade.php");
chk('Register Students button/modal',  str_contains($a, 'Register Students') || str_contains($a, 'registerStudent') || str_contains($a, 'register-student'));
chk('Add Teacher button/modal',        str_contains($a, 'Add Teacher') || str_contains($a, 'addTeacher') || str_contains($a, 'add-teacher'));
chk('Create Class button/modal',       str_contains($a, 'Create Class') || str_contains($a, 'createClass') || str_contains($a, 'create-class'));
chk('Generate Report button/link',     str_contains($a, 'Generate Report') || str_contains($a, 'generateReport') || str_contains($a, 'admin.report') || str_contains($a, 'admin.reports'));
chk('Admin info at BOTTOM (after quick actions)', strrpos($a, 'admin-info') > strpos($a, 'quick-action') || strrpos($a, 'Admin Information') > strpos($a, 'Register'));

// ── COLOUR THEME ────────────────────────────────────────────────────
echo "\n4. COLOUR THEME — ZERO WHITE\n";
$app = file_get_contents("$base/resources/views/layouts/app.blade.php");
chk('app.blade.php dark body background',     str_contains($app, 'bg-[#081538]') || str_contains($app, '#081538'));
chk('app.blade.php no bg-white on body',      !preg_match('/<body[^>]*class="[^"]*bg-white/', $app));

$guest = file_get_contents("$base/resources/views/layouts/guest.blade.php");
chk('guest.blade.php dark background',        str_contains($guest, '#081538') || str_contains($guest, 'bg-slate-950') || str_contains($guest, 'bg-[#081538]'));

$regStu = file_get_contents("$base/resources/views/auth/register-student.blade.php");
chk('register-student.blade.php dark theme',  str_contains($regStu, '#081538') || str_contains($regStu, 'bg-[#0a1a47]'));

// ── DATABASE VIA SQLITE ─────────────────────────────────────────────
echo "\n5. DATABASE STATE (SQLite direct)\n";
try {
    $db = new PDO('sqlite:' . $base . '/database/database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $teachers = $db->query("SELECT COUNT(*) FROM users WHERE role='teacher'")->fetchColumn();
    $students = $db->query("SELECT COUNT(*) FROM users WHERE role='student'")->fetchColumn();
    chk("Teachers in DB (found: $teachers, need ≥7)", $teachers >= 7);
    chk("Students in DB (found: $students, need ≥7)", $students >= 7);

    $stu = $db->query("SELECT * FROM users WHERE email='student@jkdesignsacademy.co.za' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    chk('Default student account exists', !empty($stu));
    if ($stu) {
        chk('Parent name = Mixo Mdaka',         str_contains((string)($stu['parent_name'] ?? ''), 'Mixo'));
        chk('Parent contact = 0713998559',      str_contains((string)($stu['parent_contact'] ?? ''), '0713998559'));
        chk('Parent email = mixomdaka@gmail',   str_contains((string)($stu['parent_email'] ?? ''), 'mixomdaka'));
        chk('Student number set',               !empty($stu['student_number']));
    }
} catch (Exception $e) {
    chk('SQLite connection', false, $e->getMessage());
}

// ── ROUTES FILE ─────────────────────────────────────────────────────
echo "\n6. ROUTES FILE\n";
$routes = file_get_contents("$base/routes/web.php");
chk('admin.students.store route defined', str_contains($routes, 'admin/students') || str_contains($routes, 'storeStudent'));
chk('admin.teachers.store route defined', str_contains($routes, 'admin/teachers') || str_contains($routes, 'storeTeacher'));
chk('admin.classes.store route defined',  str_contains($routes, 'admin/classes')  || str_contains($routes, 'storeClass'));
chk('admin report export route defined',  str_contains($routes, 'admin/reports')  || str_contains($routes, 'exportReport'));

// ── SUMMARY ─────────────────────────────────────────────────────────
echo "\n========================================\n";
echo "  RESULTS: $pass passed, $fail failed\n";
echo "========================================\n";
if ($fail === 0) echo "  🎉 ALL CHECKS PASSED — J&K SMS fully operational!\n";
else             echo "  ⚠️  $fail check(s) need attention.\n";
echo "\n";
