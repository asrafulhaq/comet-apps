<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\FrontendPageController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PortfolioCategoryController;






// admin auth routes
Route::group(['middleware' => 'admin.redirect'], function(){
    Route::get('/admin-login' , [ AdminAuthController::class, 'showLoginPage' ]) -> name('admin.login.page');
    Route::post('/admin-login' , [ AdminAuthController::class, 'login' ]) -> name('admin.login');
}); 



// admin page routes 
Route::group([ 'middleware' => 'admin' ], function(){
    Route::get('/dashboard' , [ AdminPageController::class, 'showDashboard' ]) -> name('admin.dashboard');
    Route::get('/admin-logout' , [ AdminAuthController::class, 'logout' ]) -> name('admin.logout');

    // permission outes 
    Route::resource('/permission', PermissionController::class);
    // Roles routes 
    Route::resource('/role', RoleController::class);
    // Roles routes 
    Route::resource('/admin-user', AdminController::class);
    Route::get('/admin-user-status-update/{id}', [ AdminController::class, 'updateStatus' ]) -> name('admin.status.update');
    Route::get('/admin-user-trash-update/{id}', [ AdminController::class, 'updateTrash' ]) -> name('admin.trash.update');
    Route::get('/admin-trash', [ AdminController::class, 'trashUsers' ]) -> name('admin.trash');


    // slider routes 
    Route::resource('/slider', SliderController::class);
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('/client', ClientController::class);
    Route::resource('/counter', CounterController::class);
    Route::resource('/portfolio-category', PortfolioCategoryController::class);
    Route::resource('/portfolio', PortfolioController::class);


    
});


/**
 * Frontend Routes  
 */
 Route::get('/', [ FrontendPageController::class, 'showHomePage' ]) -> name('home.page');
 Route::get('/contact', [ FrontendPageController::class, 'showContactPage' ]) -> name('contact.page');

