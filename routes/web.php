<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CourseController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('frontend.index');

Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::post('/user/profile/update', [UserController::class, 'userProfileUpdate'])->name('user.profile.update');
    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');


    //Route Guru
    Route::get('/all/guru', [AdminController::class, 'AllGuru'])->name('all.guru');

    
    //Category All Route
    Route::controller(CategoryController::class)->group(function(){
        Route::get('all/category', 'AllCategory')->name('all.category');
        Route::get('add/category', 'AddCategory')->name('add.category');
        Route::post('store/category', 'StoreCategory')->name('store.category');
        Route::get('edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('update/category', 'UpdateCategory')->name('update.category');
        Route::get('delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    //Category All Route
    Route::controller(CategoryController::class)->group(function(){
        Route::get('all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::get('edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::post('update/subcategory', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');
    });

});

Route::middleware(['auth','role:guru'])->group(function(){
    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/guru/logout', [GuruController::class, 'guruLogout'])->name('guru.logout');
    Route::get('/guru/profile', [GuruController::class, 'guruProfile'])->name('guru.profile');
    Route::post('/guru/profile/store', [GuruController::class, 'guruProfileStore'])->name('guru.profile.store');
    Route::get('/guru/change/password', [GuruController::class, 'guruChangePassword'])->name('guru.change.password');
    Route::post('/guru/update/password', [GuruController::class, 'guruUpdatePassword'])->name('guru.update.password');

    //Route Guru
    Route::get('/all/course', [CourseController::class, 'AllCourse'])->name('all.course');

});





Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
