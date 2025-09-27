<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public Pages Routes
Route::get('/', function () {
    return view('home');
})->name('home');


// About Us Page Route

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

// Projects Pages Routes
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

// Legacy Solutions Pages Routes (for backward compatibility)

Route::get('/construction-management', function () {
    return view('construction-management');
})->name('construction-management');

Route::get('/development-management', function () {
    return view('development-management');
})->name('development-management');

Route::get('/project-delivery-partners', function () {
    return view('project-delivery-partners');
})->name('project-delivery-partners');

Route::get('/project-types', function () {
    return view('project-types');
})->name('project-types');


// gallery pages Route

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

// News and Blogs Page Route

Route::get('/news-and-blogs', [HomeController::class, 'newsAndBlogs'])->name('news-and-blogs');

// Single Blog Post Route
Route::get('/blog/{blog:slug}', [HomeController::class, 'singlePost'])->name('single-post');

// Contact Us Page Route

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

// Contact Form Submission Route
Route::post('/contact-us', [HomeController::class, 'submitContactForm'])->name('contact.submit');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin Routes
    Route::get('/admin/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');
    Route::get('/admin/gallery/create', [AdminController::class, 'createGallery'])->name('admin.gallery.create');
    Route::get('/admin/gallery/{gallery}/edit', [AdminController::class, 'editGallery'])->name('admin.gallery.edit');
    Route::get('/admin/blogs', [AdminController::class, 'blogs'])->name('admin.blogs');
    Route::get('/admin/blogs/create', [AdminController::class, 'createBlog'])->name('admin.blogs.create');
    Route::get('/admin/blogs/{blog}/edit', [AdminController::class, 'editBlog'])->name('admin.blogs.edit');
    Route::get('/admin/projects', [AdminController::class, 'projects'])->name('admin.projects');
    Route::get('/admin/projects/create', [AdminController::class, 'createProject'])->name('admin.projects.create');
    Route::get('/admin/projects/{project}/edit', [AdminController::class, 'editProject'])->name('admin.projects.edit');
    
    // Gallery API Routes
    Route::post('/admin/gallery', [AdminController::class, 'storeGallery'])->name('admin.gallery.store');
    Route::put('/admin/gallery/{gallery}', [AdminController::class, 'updateGallery'])->name('admin.gallery.update');
    Route::delete('/admin/gallery/{gallery}', [AdminController::class, 'destroyGallery'])->name('admin.gallery.destroy');
    
    // Blog API Routes
    Route::post('/admin/blogs', [AdminController::class, 'storeBlog'])->name('admin.blogs.store');
    Route::put('/admin/blogs/{blog}', [AdminController::class, 'updateBlog'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/{blog}', [AdminController::class, 'destroyBlog'])->name('admin.blogs.destroy');
    
    // Project API Routes
    Route::post('/admin/projects', [AdminController::class, 'storeProject'])->name('admin.projects.store');
    Route::put('/admin/projects/{project}', [AdminController::class, 'updateProject'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [AdminController::class, 'destroyProject'])->name('admin.projects.destroy');
});

require __DIR__.'/auth.php';
