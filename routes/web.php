<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Controllers\{
    FaqController,
    PostController,
    TeamController,
    AboutController,
    AdminController,
    WorkCategoryController,
    SearchController,
    SingleController,
    ContactController,
    CountryController,
    FaviconController,
    ServiceController,
    CategoryController,
    FrontViewController,
    CoverImageController,
    CompanyController,
    SiteSettingController,
    TestimonialController,
    VisitorBookController,
    PhotoGalleryController,
    ApplicationController,
    VideoGalleryController,
    StudentDetailController,
    UserManagementController,
    ClientMessageController,
    BlogPostsCategoryController,
    Auth\ResetPasswordController,
    CeoMessageController,
    ClientController,
    WhyUsController,
    EventController,
    ProjectController,
    NotificationController,
    CareerController,
    CareerApplicationController,
    ProductController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🌐 Language switching
Route::get('/lang/{lang}', function ($lang) {
    $supportedLocales = config('app.available_locales');
    if (!in_array($lang, array_keys($supportedLocales))) {
        return redirect()->route('index');
    }
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('index');
});



// ========================
// 🌐 Frontend Routes
// ========================
Route::get('/', [FrontViewController::class, 'index'])->name('index');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/contactpage', [ContactController::class, 'store'])->name('Contact.store');

// 📄 Static Pages
Route::get('/contactpage', [SingleController::class, 'render_contact'])->name('Contact');
Route::get('/aboutus', [SingleController::class, 'render_about'])->name('About');
Route::get('/whyus', [SingleController::class, 'render_whyus'])->name('whyus');
Route::get('/history', [SingleController::class, 'render_history'])->name('history');
Route::get('/faqs', [SingleController::class, 'render_faqs'])->name('faqs');
Route::get('/procurement', [SingleController::class, 'render_faqs'])->name('frontend.procurement'); 
Route::get('/testimonails', [SingleController::class, 'render_testimonial'])->name('testimonails');

// 📰 Blog & Categories
Route::get('/blogpostcategories', [SingleController::class, 'render_blogpostcategory'])->name('Blogpostcategory');
Route::get('/blog-category/{slug}', [SingleController::class, 'render_singleBlogpostcategory'])->name('SingleBlogpostcategory');
Route::get('/singlecategory/{slug}', [SingleController::class, 'render_singleCategory'])->name('singleCategory');
Route::get('/singlepost/{slug}', [SingleController::class, 'render_singlePost'])->name('singlePost');

// 👥 Team & Services
Route::get('/team', [SingleController::class, 'render_team'])->name('Team');
Route::get('/services', [SingleController::class, 'render_service'])->name('Service');
Route::get('/singleservice/{slug}', [SingleController::class, 'render_singleService'])->name('SingleService');

// 🌏 Countries & Companies
Route::get('/countries', [SingleController::class, 'render_Countries'])->name('Countries');
Route::get('/singlecountry/{slug}', [SingleController::class, 'render_singleCountry'])->name('singleCountry');
Route::get('/singlecompany/{slug}', [SingleController::class, 'render_singleCompany'])->name('singleCompany');
Route::get('/singleworkcategory/{slug}', [SingleController::class, 'render_singleworkCategory'])->name('singleworkCategory');

// 📷 Gallery & Events
Route::get('/gallery', [SingleController::class, 'render_gallery'])->name('Gallery');
Route::get('/gallerys/{slug}', [SingleController::class, 'render_singleImage'])->name('singleImage');
Route::get('/events', [SingleController::class, 'render_events'])->name('events');
Route::get('/singleevent/{slug}', [SingleController::class, 'render_singleEvent'])->name('singleEvent');

// 📢 Applications
Route::get('/apply/{id}', [SingleController::class, 'showApplicationForm'])->name('apply');
Route::post('/apply/{id}', [ApplicationController::class, 'store'])->name('apply.store');

// 🛒 Products (Frontend)
Route::get('/products', [SingleController::class, 'render_products'])->name('products.index.front');
Route::get('/products/{id}', [SingleController::class, 'render_singleProduct'])->name('products.detail');


// Extra static pages (optional)
Route::get('/career', [SingleController::class, 'render_career'])->name('career');
Route::get('/volunteer', [SingleController::class, 'render_volunteer'])->name('volunteer');
Route::get('/applycareer', [SingleController::class, 'render_applycareer'])->name('applycareer');

// Career Applications
Route::post('/career-applications', [CareerApplicationController::class, 'store'])->name('career-applications.store');

// ========================
// 🔐 Authentication Routes
// ========================
Auth::routes();
Route::post('/change-password', [ResetPasswordController::class, 'updatePassword'])
    ->name('changePassword')->middleware('auth');

// ========================
// 🛠 Backend (Admin) Routes
// ========================
Route::prefix('/admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Resource Controllers
    Route::resources([
        'site-settings' => SiteSettingController::class,
        'cover-images' => CoverImageController::class,
        'about-us' => AboutController::class,
        'ceomessage' => CeoMessageController::class,
        'client' => ClientController::class,
        'services' => ServiceController::class,
        'categories' => CategoryController::class,
        'posts' => PostController::class,
        'photo-galleries' => PhotoGalleryController::class,
        'video-galleries' => VideoGalleryController::class,
        'testimonials' => TestimonialController::class,
        'visitors-book' => VisitorBookController::class,
        'blog-posts-categories' => BlogPostsCategoryController::class,
        'work_categories' => WorkCategoryController::class,
        'teams' => TeamController::class,
        'faqs' => FaqController::class,
        'events' => EventController::class,
        'countries' => CountryController::class,
        'companies' => CompanyController::class,
        'student-details' => StudentDetailController::class,
        'contacts' => ContactController::class,
        'favicons' => FaviconController::class,
        'client_messages' => ClientMessageController::class,
        // 'demands' => DemandController::class, // deprecated
        'projects' => ProjectController::class,
        'products' => ProductController::class,
        'notifications' => NotificationController::class,
        'careers' => CareerController::class,
    ]);

    // Notifications Status Toggle
    Route::patch('/notifications/{id}/toggle-status', [NotificationController::class, 'toggleStatus'])->name('notifications.toggle-status');

    // Careers Status Toggle
    Route::patch('/careers/{id}/toggle-status', [CareerController::class, 'toggleStatus'])->name('careers.toggle-status');

    // Career Applications Management
    Route::get('/career-applications', [CareerApplicationController::class, 'index'])->name('career-applications.index');
    Route::get('/career-applications/{application}', [CareerApplicationController::class, 'show'])->name('career-applications.show');
    Route::patch('/career-applications/{application}/update-status', [CareerApplicationController::class, 'updateStatus'])->name('career-applications.update-status');
    Route::delete('/career-applications/{application}', [CareerApplicationController::class, 'destroy'])->name('career-applications.destroy');

    // Applications Management
    Route::get('/applications', [ApplicationController::class, 'adminIndex'])->name('applications.index');
    Route::post('/applications/{application}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');
    Route::post('/applications/{application}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
});

// ========================
// 🎯 WhyUs Section (Backend)
// ========================
Route::prefix('backend')->name('backend.')->group(function () {
    Route::get('/whyus', [WhyUsController::class, 'index'])->name('whyus.index');
    Route::get('/whyus/create', [WhyUsController::class, 'create'])->name('whyus.create');
    Route::post('/whyus/store', [WhyUsController::class, 'store'])->name('whyus.store');
    Route::get('/whyus/{id}/edit', [WhyUsController::class, 'edit'])->name('whyus.edit');
    Route::put('/whyus/{id}', [WhyUsController::class, 'update'])->name('whyus.update');
    Route::delete('/whyus/{id}', [WhyUsController::class, 'destroy'])->name('whyus.destroy');
});

// ========================
// 🎯 Events Section (Backend alias)
// ========================
Route::prefix('backend')->name('backend.')->group(function () {
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
});


Route::get('/events/{slug}', [EventController::class, 'show'])
     ->name('singleevents');



    
      
