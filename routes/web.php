<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SquarePaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', "HomeController@index")->name('home');
Route::get('/about', "HomeController@about")->name('about');
Route::get('/menu', "HomeController@menu")->name('menu');
Route::get('/categories', "HomeController@categories")->name('categories');
Route::get('/product/{id}', "HomeController@post")->name('product');
Route::get('/shop', "HomeController@shop")->name('shop');
Route::get('/contact', "HomeController@contact")->name('contact');
route::post('SendMessage', 'HomeController@SendMessage')->name('SendMessage');
route::post('AddToCart/{id}', 'HomeController@AddToCart')->name('AddToCart');
route::post('deleteCart/{id}', 'HomeController@deleteCart')->name('deleteCart');
route::post('cartPlus/{id}', 'HomeController@cartPlus')->name('cartPlus');
route::post('cartMin/{id}', 'HomeController@cartMin')->name('cartMin');
route::get('cart/', 'HomeController@cart')->name('cart');
route::get('shop-single/{id}', 'HomeController@shop_single')->name('shop_single');
Route::get('/checkout', "HomeController@checkout")->name('checkout')->middleware('auth:web');

Route::get('/create-payment', [SquarePaymentController::class, 'createPayment']);
Route::post('/process-payment', [SquarePaymentController::class, 'processPayment']);

Route::post('/webhook-handler', 'WebhookController@handle');
Route::get('/my-orders', 'HomeController@myOrders')->name('orders');



//DASHHHHHHHBOARD
Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('doLogin');
    Route::post('/login', [LoginController::class, 'doLogin'])->name('login');
});
//DASHHHHHHHBOARD
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'name' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('/index', 'DashboardController@index')->name('index');
    Route::resource('/slider', 'SliderController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/product', 'ProductController');
    Route::resource('/about', 'AboutController');
    Route::resource('/testmonials', 'TestmonialsController');
    Route::resource('/news', 'NewsController');
    Route::get('messages', 'AboutController@messages')->name('messages');
    Route::delete('messages/{id}', 'AboutController@messagesDelete')->name('messagesDelete');
    Route::get('order', 'AboutController@order')->name('order');
    Route::get('settings', 'settingsController@index')->name('settings');
    Route::post('settings', 'settingsController@store')->name('settings.store');
    Route::get('users', 'settingsController@users')->name('users.index');
});