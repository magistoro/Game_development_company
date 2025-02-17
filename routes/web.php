<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\QuestionCategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  function(){
    return redirect()->route('home');
});

// login
Route::get('/profile', [HomeController::class, 'profile'])->name('profile')/*->middleware('auth.redirect')*/;
Route::post('/users/{id}', [HomeController::class, 'update'])->name('user.update');

// Home
Route::get('/home', [IndexController::class, 'index'])->name('home');

Route::get('/_home', [IndexController::class, '_index'])->name('_home');

Route::get('/dayQuest', [IndexController::class, 'dayQuest'])->name('dayQuest');


// Google
Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::post('registration', [GoogleController::class, 'registrationWithGoogle'])->name('registration');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
Route::get('auth/google/callback', [GoogleController::class, 'callbackFromGoogle']);




Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'as' => 'admin.',
  ], function () {
      
     Route::get('/', [AdminIndexController::class, 'index'])->name('index');

    // Route::prefix('products')->namespace('App\Http\Controllers\Admin')->name('products.')->group(function() {
    //     // products Index (Admin)
    //     Route::get('/', [AdminProductController::class, 'index'])->name('index');
    //     // products Create
    //     Route::get('/create', [AdminProductController::class, 'create'])->name('create');
    //     // products Store
    //     Route::post('/', [AdminProductController::class, 'store'])->name('store');
    //     // products Edit 
    //     Route::get('/{product}/edit', [AdminProductController::class, 'edit'])->name('edit');
    //     Route::get('/{product}', [AdminProductController::class, 'show'])->name('show');
    //     // products Update
    //     Route::patch('/{product}', [AdminProductController::class, 'update'])->name('update');
    //     // products Destroy 
    //     Route::delete('/{product}', [AdminProductController::class, 'destroy'])->name('destroy');
    // });

    Route::prefix('category')->namespace('App\Http\Controllers\Admin')->name('category.')->group(function() {
        // products Index (Admin)
        Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [AdminCategoryController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{category}/edit', [AdminCategoryController::class, 'edit'])->name('edit');

        Route::get('/{category}', [AdminCategoryController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{category}', [AdminCategoryController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('user')->namespace('App\Http\Controllers\Admin')->name('user.')->group(function() {
        // products Index (Admin)
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [AdminUserController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('edit');

        Route::get('/{user}', [AdminUserController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{user}', [AdminUserController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{user}', [AdminUserController::class, 'destroy'])->name('destroy');

        Route::get('/unlinkGoogle', [AdminUserController::class, 'unlinkGoogle'])->name('unlinkGoogle');
    });

    Route::prefix('role')->namespace('App\Http\Controllers\Admin')->name('role.')->group(function() {
        // products Index (Admin)
        Route::get('/', [RoleController::class, 'index'])->name('index');
        // products Create
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        // products Store
        Route::post('/', [RoleController::class, 'store'])->name('store');
        // products Edit 
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');

        Route::get('/{role}', [RoleController::class, 'show'])->name('show');
        // products Update
        Route::patch('/{role}', [RoleController::class, 'update'])->name('update');
        // products Destroy 
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
    });

    // Route::prefix('type')->namespace('App\Http\Controllers\Admin')->name('type.')->group(function() {
    //     // products Index (Admin)
    //     Route::get('/', [AdminTypeController::class, 'index'])->name('index');
    //     // products Create
    //     Route::get('/create', [AdminTypeController::class, 'create'])->name('create');
    //     // products Store
    //     Route::post('/', [AdminTypeController::class, 'store'])->name('store');
    //     // products Edit 
    //     Route::get('/{product:slug}/edit', [AdminTypeController::class, 'edit'])->name('edit');
    //     // products Update
    //     Route::patch('/{product:slug}', [AdminTypeController::class, 'update'])->name('update');
    //     // products Destroy 
    //     Route::delete('/{product:slug}', [AdminTypeController::class, 'destroy'])->name('destroy');
    // });



    // // Route::prefix('order')->namespace('App\Http\Controllers\Admin')->name('order.')->group(function() {
    //     Route::prefix('sale')->namespace('App\Http\Controllers\Admin')->name('sale.')->group(function() {
    //         // products Index (Admin)
    //         Route::get('/', [OrderController::class, 'index'])->name('index');

    //         Route::get('/notifications', [OrderController::class, 'getNotifications'])->name('getNotifications');
    //         // products Create
    //         Route::get('/create', [OrderController::class, 'create'])->name('create');
    //         // products Store
    //         Route::post('/', [OrderController::class, 'store'])->name('store');
    //         // products Edit 
    //         Route::get('/{soldOrder}/edit', [OrderController::class, 'edit'])->name('edit');
            
    //         Route::get('/{soldOrder}', [OrderController::class, 'show'])->name('show');

    //         Route::patch('/{soldOrder}/updateStatus', [OrderController::class, 'updateStatus'])->name('updateStatus');
            
    //         // products Update
    //         Route::patch('/{soldOrder}', [OrderController::class, 'update'])->name('update');
    //         // products Destroy 
    //         Route::delete('/{soldOrder}', [OrderController::class, 'destroy'])->name('destroy');
    //         });

    //     Route::prefix('rent')->namespace('App\Http\Controllers\Admin')->name('rent.')->group(function() {
    //         // products Index (Admin)
    //         Route::get('/', [OrderController::class, 'index'])->name('index');
    //         // products Create
    //         Route::get('/create', [OrderController::class, 'create'])->name('create');
    //         // products Store
    //         Route::post('/', [OrderController::class, 'store'])->name('store');
    //         // products Edit 
    //         Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('edit');
    //         Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    //         // products Update
    //         Route::patch('/{order}', [OrderController::class, 'update'])->name('update');
    //         // products Destroy 
    //         Route::delete('/{order}', [OrderController::class, 'destroy'])->name('destroy');
    //         });


    });



Auth::routes();

