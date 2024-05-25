<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Frontend\SslCommerzPaymentController;
use App\Http\Controllers\Backend\FoodController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WebpageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SslCommerzPaymentController as ControllersSslCommerzPaymentController;
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
*/

//WEBSITE//HOMEPAGE

Route::get('/', [WebpageController::class, 'homepage'])->name('homepage');
Route::get('about-us', [WebpageController::class, 'about_us'])->name('about.us');
Route::get('/food/under/category/{cat_id}', [WebpageController::class, 'foodUnderCategory'])->name('food.under.category');

//REGISTRATION

  Route::get('/customer', [WebpageController::class, 'formreg'])->name('register');
  Route::post('/customer/done', [WebpageController::class, 'reg'])->name('customer.done');
//WEBSITE//REGISTRATION//LOGIN
  Route::get('/login/form', [WebpageController::class, 'loginForm'])->name('login.form');
  Route::post('/login/success', [WebpageController::class, 'loginsuccess'])->name('login.success');

   Route::middleware('auth:customerGuard')->group(function () {
 //logout
   Route::get('/logout/success', [WebpageController::class, 'logoutsuccess'])->name('logout.success');
   Route::get('/profile/view', [WebpageController::class, 'profileview'])->name('profile.view');
   Route::get('/profile/order/{id}', [WebpageController::class, 'singleOrderView'])->name('profile.view.order');
   Route::get('/profile/edit/{id}', [WebpageController::class, 'profileEdit'])->name('edit.profile');
   Route::put('/profile/update/{id}', [WebpageController::class, 'profileUpdate'])->name('update.profile');

   //ORDER 
   Route::get('/add-to-cart/{productId}', [OrderController::class, 'addToCart'])->name('add.to.cart');
   Route::get('/view-cart', [OrderController::class, 'viewCart'])->name('view.cart');
   Route::get('/clear-cart', [OrderController::class, 'clearCart'])->name('clear.cart');
   Route::get('/delete-order/{orderId}', [OrderController::class, 'deleteorder'])->name('delete.order');
   
   Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
   Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
   Route::post('/update-cart', [OrderController::class, 'updateCart'])->name('update.cart');
   
});

   // SSLCOMMERZ Start
   Route::post('/success', [SslCommerzPaymentController::class, 'success']);
   Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
   Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
   Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
   //SSLCOMMERZ END






     //ADMIN LOGIN
      Route::group(['prefix' => 'admin'], function () {
      Route::get('/login', [UserController::class, 'login'])->name('admin.login');
      Route::post('/do-login', [UserController::class, 'doLogin'])->name('admin.do.login');

      Route::group(['middleware' => 'auth'], function () {

      //DASHBOARD
      Route::get('/', [HomeController::class, 'showHomePage'])->name('dashboard');
      //SIGNOUT
      Route::get('sign-out', [UserController::class, 'signout'])->name('do.signout');

      //CATEGORY
      Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
      Route::get('/category/form', [CategoryController::class, 'categoryForm'])->name('category.form');
      Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
      Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
      Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
      Route::get('/category/delete/{category_id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
      Route::get('/category/view/{id}', [CategoryController::class, 'categoryView'])->name('category.view');

      //FOOD
      Route::get('/food/list', [FoodController::class, 'foodlist'])->name('food.list');
      Route::get('/food/form', [FoodController::class, 'foodform'])->name('food.form');
      Route::post('/food/store', [FoodController::class, 'foodstore'])->name('food.store');
      Route::get('/food/edit/{id}', [FoodController::class, 'foodedit'])->name('food.edit');
      Route::post('/food/update/{id}', [FoodController::class, 'foodupdate'])->name('food.update');
      Route::get('/food/delete/{food_id}', [FoodController::class, 'foodDelete'])->name('food.delete');
      Route::get('/food/view/{id}', [FoodController::class, 'foodView'])->name('food.view');

      ///CUSTOMER
      Route::get('/customer/list', [CustomerController::class, 'customerlist'])->name('customer.list');
      Route::get('/customer/form', [CustomerController::class, 'customerform'])->name('customer.form');
      Route::post('/customer/store', [CustomerController::class, 'customerStore'])->name('customer.store');
      Route::get('/customer/edit/{id}', [CustomerController::class, 'customerEdit'])->name('customer.edit');
      Route::post('/customer/update/{id}', [CustomerController::class, 'customerUpdate'])->name('customer.update');
      Route::get('/customer/delete/{category_id}', [CustomerController::class, 'customerDelete'])->name('customer.delete');
      Route::get('/customer/view/{id}', [CustomerController::class, 'customerView'])->name('customer.view');

      //ADMIN ORDER
      Route::get('/order/list', [BackendOrderController::class, 'orderList'])->name('order.list');
      //REPORT
      Route::get('/report-list', [BackendOrderController::class, 'reportList'])->name('report.list');

      
   });
});
