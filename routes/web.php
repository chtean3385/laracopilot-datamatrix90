<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\SocialFeedController;
use App\Http\Controllers\Admin\SettingController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Admin Authentication
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Admin Gallery Management
Route::get('/admin/gallery', [AdminGalleryController::class, 'index'])->name('admin.gallery.index');
Route::get('/admin/gallery/create', [AdminGalleryController::class, 'create'])->name('admin.gallery.create');
Route::post('/admin/gallery', [AdminGalleryController::class, 'store'])->name('admin.gallery.store');
Route::get('/admin/gallery/{id}/edit', [AdminGalleryController::class, 'edit'])->name('admin.gallery.edit');
Route::put('/admin/gallery/{id}', [AdminGalleryController::class, 'update'])->name('admin.gallery.update');
Route::delete('/admin/gallery/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.gallery.destroy');

// Admin Events Management
Route::get('/admin/events', [AdminEventController::class, 'index'])->name('admin.events.index');
Route::get('/admin/events/create', [AdminEventController::class, 'create'])->name('admin.events.create');
Route::post('/admin/events', [AdminEventController::class, 'store'])->name('admin.events.store');
Route::get('/admin/events/{id}/edit', [AdminEventController::class, 'edit'])->name('admin.events.edit');
Route::put('/admin/events/{id}', [AdminEventController::class, 'update'])->name('admin.events.update');
Route::delete('/admin/events/{id}', [AdminEventController::class, 'destroy'])->name('admin.events.destroy');
Route::get('/admin/events/{id}/registrations', [AdminEventController::class, 'registrations'])->name('admin.events.registrations');

// Admin About Management
Route::get('/admin/about', [AdminAboutController::class, 'index'])->name('admin.about.index');
Route::put('/admin/about', [AdminAboutController::class, 'update'])->name('admin.about.update');

// Admin Social Feed Management
Route::get('/admin/social-feeds', [SocialFeedController::class, 'index'])->name('admin.social-feeds.index');
Route::get('/admin/social-feeds/create', [SocialFeedController::class, 'create'])->name('admin.social-feeds.create');
Route::post('/admin/social-feeds', [SocialFeedController::class, 'store'])->name('admin.social-feeds.store');
Route::get('/admin/social-feeds/{id}/edit', [SocialFeedController::class, 'edit'])->name('admin.social-feeds.edit');
Route::put('/admin/social-feeds/{id}', [SocialFeedController::class, 'update'])->name('admin.social-feeds.update');
Route::delete('/admin/social-feeds/{id}', [SocialFeedController::class, 'destroy'])->name('admin.social-feeds.destroy');

// Admin Settings Management
Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin.settings.index');
Route::put('/admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');