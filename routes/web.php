<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FrontendDonationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TransparencyController;
use App\Http\Controllers\LocationSettingController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Fview\PController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Middleware\SetLocale;

Route::middleware([SetLocale::class])->group(function () {

Route::get('/', [PController::class, 'index'])->name('home');




Route::get('/inde', function () {
    return view('inde');
});

Route::get('/organization-profile', [PController::class, 'profile'])->name('organization.profile');




Route::get('/training', function () {
    return view('training');
})->name('training');

Route::get('/donate', [FrontendDonationController::class, 'index'])->name('donate');
Route::post('/donate', [FrontendDonationController::class, 'store'])->name('donate.store');
Route::get('/donate/success', [FrontendDonationController::class, 'success'])->name('donate.success');

Route::get('/cleanwatercard', function () {
    return view('cleanwatercard');
})->name('cleanwatercard');

Route::get('/Protection', function () {
    return view('Protection');
})->name('Protection');
Route::get('/Livelihood', function () {
    return view('Livelihood');
})->name('Livelihood');

Route::get('/Environmental', function () {
    return view('Environmental');
})->name('Environmental');

Route::get('/Nutrition', function () {
    return view('Nutrition');
})->name('Nutrition');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// CMS Admin Routes group
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Hero Management
    Route::get('hero', [HeroController::class, 'index'])->name('hero.index');
    Route::post('hero', [HeroController::class, 'update'])->name('hero.update');

    // Statistics Management
    Route::get('statistics', [StatisticController::class, 'index'])->name('statistics.index');
    Route::post('statistics', [StatisticController::class, 'update'])->name('statistics.update');

    // About Management
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::post('about', [AboutController::class, 'update'])->name('about.update');

    // Profile Management
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/update-settings', [\App\Http\Controllers\Admin\ProfileController::class, 'updateSettings'])->name('profile.update_settings');
    Route::post('profile/items', [\App\Http\Controllers\Admin\ProfileController::class, 'storeItem'])->name('profile.store_item');
    Route::put('profile/items/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'updateItem'])->name('profile.update_item');
    Route::delete('profile/items/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'destroyItem'])->name('profile.destroy_item');

    // Transparency Management
    Route::get('transparency', [TransparencyController::class, 'index'])->name('transparency.index');
    Route::post('transparency', [TransparencyController::class, 'update'])->name('transparency.update');
    Route::delete('transparency/file', [TransparencyController::class, 'deleteFile'])->name('transparency.delete_file');
    Route::post('transparency/reports', [\App\Http\Controllers\Admin\TransparencyReportController::class, 'store'])->name('transparency_reports.store');
    Route::put('transparency/reports/{report}', [\App\Http\Controllers\Admin\TransparencyReportController::class, 'update'])->name('transparency_reports.update');
    Route::delete('transparency/reports/{report}', [\App\Http\Controllers\Admin\TransparencyReportController::class, 'destroy'])->name('transparency_reports.destroy');
    Route::post('transparency/funding-sources', [TransparencyController::class, 'storeFundingSource'])->name('transparency_funding_sources.store');
    Route::put('transparency/funding-sources/{source}', [TransparencyController::class, 'updateFundingSource'])->name('transparency_funding_sources.update');
    Route::delete('transparency/funding-sources/{source}', [TransparencyController::class, 'destroyFundingSource'])->name('transparency_funding_sources.destroy');
    Route::get('partnerships', [TransparencyController::class, 'partnershipsIndex'])->name('partnerships.index');
    Route::post('transparency/partnerships', [TransparencyController::class, 'storePartnership'])->name('transparency_partnerships.store');
    Route::put('transparency/partnerships/{partnership}', [TransparencyController::class, 'updatePartnership'])->name('transparency_partnerships.update');
    Route::delete('transparency/partnerships/{partnership}', [TransparencyController::class, 'destroyPartnership'])->name('transparency_partnerships.destroy');

    // Location Settings Management - audit log routes FIRST to avoid resource conflicts
    Route::post('location/{location}/add-log', [LocationSettingController::class, 'addLog'])->name('location.add-log');
    Route::delete('location-log/{log}', [LocationSettingController::class, 'deleteLog'])->name('location.delete-log');
    Route::resource('location', LocationSettingController::class);

    // Projects Management
    Route::get('projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::get('projects/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('projects', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('projects/{id}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('projects/{id}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('projects/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');

    // Project Activities Management
    Route::resource('projects.activities', \App\Http\Controllers\ProjectActivityController::class);

    // News Management
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Members Management
    Route::get('members', [MemberController::class, 'index'])->name('members.index');
    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('members/store', [MemberController::class, 'store'])->name('members.store');
    Route::post('members/settings', [MemberController::class, 'updateSettings'])->name('members.updateSettings');
    Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

    // Testimonials Management
    Route::get('testimonials', [TestimonialsController::class, 'index'])->name('testimonials.index');
    Route::get('testimonials/create', [TestimonialsController::class, 'create'])->name('testimonials.create');
    Route::post('testimonials/store', [TestimonialsController::class, 'store'])->name('testimonials.store');
    Route::get('testimonials/{testimonial}/edit', [TestimonialsController::class, 'edit'])->name('testimonials.edit');
    Route::put('testimonials/{testimonial}', [TestimonialsController::class, 'update'])->name('testimonials.update');
    Route::delete('testimonials/{testimonial}', [TestimonialsController::class, 'destroy'])->name('testimonials.destroy');

    // Contacts Management
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Inquiries Management
    Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

    // Users Management
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('users.update_role');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Payment Methods Management
    Route::resource('payment_methods', PaymentMethodController::class);

    // Donations Management
    Route::get('donations', [DonationController::class, 'index'])->name('donations.index');
    Route::get('donations/export/pdf', [DonationController::class, 'exportPdf'])->name('donations.export_pdf');
    Route::get('donations/{donation}', [DonationController::class, 'show'])->name('donations.show');
    Route::patch('donations/{donation}/status', [DonationController::class, 'updateStatus'])->name('donations.update_status');

    // Settings Management
    Route::get('settings/donation', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/donation', [SettingController::class, 'store'])->name('settings.store');

    // Legal Content Management
    Route::get('legal', [\App\Http\Controllers\Admin\LegalContentController::class, 'index'])->name('legal.index');
    Route::put('legal/{id}', [\App\Http\Controllers\Admin\LegalContentController::class, 'update'])->name('legal.update');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
// معالجة بيانات اللوقن
Route::post('/login', [AuthController::class, 'login']);

// Password Recovery Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.forgot');
Route::post('/forgot-password', [AuthController::class, 'verifyUser'])->name('password.verify.user');
Route::post('/reset-password/update', [AuthController::class, 'updatePassword'])->name('password.reset.update');

// News routes are now under the admin prefix


// Projects routes are now under the admin prefix


// Testimonials routing is now under the admin prefix
Route::get('/contact', function () {
    return view('contacts.create');
});


// Contacts routing is now under the admin prefix

// Members routing is now under the admin prefix


Route::get('/projects/{id}', [PController::class, 'show'])->name('projects.show');
Route::get('/dnews/{id}', [PController::class, 'Nshow'])->name('dnews.show');


// حفظ الاستفسار (Public)
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

// Inquiries admin routing is now under the admin prefix

// Transparency Dashboard
Route::get('/transparency', [App\Http\Controllers\Api\TransparencyDashboardController::class, 'index'])->name('transparency.dashboard');
Route::get('/api/transparency/stream', [App\Http\Controllers\Api\TransparencyDashboardController::class, 'stream'])->name('api.transparency.stream');
Route::get('/api/transparency/map', [App\Http\Controllers\Api\TransparencyDashboardController::class, 'mapData'])->name('api.transparency.map');

});

Route::get('/change-language/{lang}', function ($lang) {
    if (in_array($lang, ['ar', 'en'])) {
        session(['locale' => $lang]);
    }
    if (request()->has('redirect')) {
        return redirect(request('redirect'));
    }
    return redirect()->back();
})->name('change-language');


// صفحة اللوقن
// مسار لفحص مشاكل الصور على الاستضافة
Route::get('/debug-img', function() {
    $news = \App\Models\News::orderBy('id', 'desc')->first();
    if (!$news || !$news->image) {
        return "لا يوجد أخبار أو صور لفحصها.";
    }

    $path = $news->image;
    $storageDiskExists = \Illuminate\Support\Facades\Storage::disk('public')->exists($path);
    $storagePathMethod = storage_path('app/public/' . $path);
    $fileExists = file_exists($storagePathMethod);
    $fileSize = $fileExists ? filesize($storagePathMethod) : 'N/A';
    $filePerms = $fileExists ? substr(sprintf('%o', fileperms($storagePathMethod)), -4) : 'N/A';
    
    $isImageCorrupt = 'N/A';
    if ($fileExists) {
        $content = file_get_contents($storagePathMethod);
        $img = @imagecreatefromstring($content);
        if ($img === false) {
            $isImageCorrupt = true; // The file is NOT a valid image
        } else {
            $isImageCorrupt = false; // The file is a valid image
            imagedestroy($img);
        }
    }
    
    return [
        'database_path' => $path,
        'storage_path_evaluated' => $storagePathMethod,
        'file_exists_check' => $fileExists,
        'file_size_bytes' => $fileSize,
        'file_permissions' => $filePerms,
        'is_image_corrupted' => $isImageCorrupt,
        'generated_url' => url('/img?path=' . $path),
        'generated_asset' => asset('img?path=' . $path),
    ];
});

// مسار لتنظيف كاش الموقع بالكامل
Route::get('/fix-cache', function() {
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    
    // التحقق مما إذا كان التعديل وصل لملف الواجهة
    $indeContent = @file_get_contents(resource_path('views/inde.blade.php'));
    $hasMedia = strpos($indeContent, '/media/') !== false;
    
    return [
        'message' => 'تم تنظيف الكاش بنجاح!',
        'views_updated_correctly' => $hasMedia ? 'نعم، الملفات الجديدة موجودة في مكانها الصحيح' : 'لا، يبدو أن فك الضغط كان خاطئاً والملفات لم تستبدل!'
    ];
});

// مسار آمن لتجاوز مانعات الإعلانات (Adblockers) وحماية الروابط (Hotlink)
Route::get('/media/{path}', function ($path) {
    if (!$path) abort(404);
    
    $file = storage_path('app/public/' . $path);
    
    if (file_exists($file)) {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
        ];
        $mime = $mimeTypes[$extension] ?? 'image/jpeg';
        
        return response(file_get_contents($file))
            ->header('Content-Type', $mime)
            ->header('Cache-Control', 'public, max-age=31536000');
    }
    
    abort(404);
})->where('path', '.*');

// الاحتفاظ بالمسار القديم مؤقتاً لعدم كسر أي روابط
Route::get('/img', function () {
    $path = request('path');
    if (!$path) abort(404);
    
    $file = storage_path('app/public/' . $path);
    
    if (file_exists($file)) {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $mimeTypes = [
            'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png',
            'gif' => 'image/gif', 'webp' => 'image/webp', 'svg' => 'image/svg+xml',
        ];
        $mime = $mimeTypes[$extension] ?? 'image/jpeg';
        return response(file_get_contents($file))
            ->header('Content-Type', $mime)
            ->header('Cache-Control', 'public, max-age=31536000');
    }
    abort(404);
});
