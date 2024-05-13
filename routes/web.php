<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\FoodController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WebpageController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
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
// */
Route::get('/',[WebpageController::class,'homepage'])->name('homepage');
// Route::get('about-us',[WebpageController::class,'about_us'])->name('about.us');


Route::get('/add-to-cart/{productId}',[OrderController::class, 'addToCart'])->name('add.to.cart');
Route::get('/view-cart',[OrderController::class,'viewCart'])->name('view.cart');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'login'])->name('admin.login');
    Route::post('/do-login', [UserController::class, 'doLogin'])->name('admin.do.login');

    Route::group(['middleware' => 'auth'], function () {

       
        Route::get('/', [HomeController::class, 'showHomePage'])->name('dashboard');

        //FOOD

        Route::get('/food/list', [FoodController::class, 'foodlist'])->name('food.list');
        Route::get('/food/form', [FoodController::class, 'foodform'])->name('food.form');
        Route::post('/food/store', [FoodController::class, 'foodstore'])->name('food.store');
        Route::get('/food/edit/{id}', [FoodController::class, 'foodedit'])->name('food.edit');
        Route::post('/food/update/{id}', [FoodController::class, 'foodupdate'])->name('food.update');
        Route::get('/food/delete/{food_id}',[FoodController::class, 'foodDelete'])->name('food.delete');
        

        Route::get('/customer/list', [CustomerController::class, 'customerlist']);

        //CATEGORY

        Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/category/form', [CategoryController::class, 'categoryForm'])->name('category.form');
        Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/category/delete/{category_id}',[CategoryController::class, 'categoryDelete'])->name('category.delete');
        

        


        //SIGNOUT
        

        Route::get('sign-out', [UserController::class, 'signout'])->name('do.signout');

       



     });
});
