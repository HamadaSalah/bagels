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

Route::get('/ttt', function () {
    $curl = curl_init();

// curl_setopt_array($curl, [
//   CURLOPT_PORT => "4430",
//   CURLOPT_URL => "https://securelink-staging.valorpaytech.com:4430/?sale=",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => json_encode([
//     'appid' => 'K718Whx3F662KHarLZsv1jVL6jnHJn16',
//     'appkey' => 'hfXHJrhHYpE503sSLMQQQGe2IELb1Ae8',
//     'epi' => '2501103429',
//     'txn_type' => 'sale',
//     'amount' => 5,
//     'cardnumber' => '4111111111111111',
//     'expirydate' => 1236,
//     'cvv' => 999,
//     'cardholdername' => 'Michael Jordan',
//     'invoicenumber' => 'inv0001',
//     'orderdescription' => 'king size bed 10x12',
//     'surchargeAmount' => 10.2,
//     'surchargeIndicator' => 1,
//     'address1' => '2 Jericho Plz',
//     'city' => 'Jericho',
//     'state' => 'NY',
//     'shipping_country' => 'US',
//     'billing_country' => 'US',
//     'zip' => '50001',
//     'customer_email' => '0',
//     'customer_sms' => '1',
//     'merchant_email' => '0'
//   ]),
//   CURLOPT_HTTPHEADER => [
//     "accept: application/json",
//     "content-type: application/json"
//   ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//     $eee = json_decode( $response);
//   dd($eee->error_no);
// }

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_PORT => "4430",
  CURLOPT_URL => "https://securelink-staging.valorpaytech.com:4430/?sale=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'appid' => 'K718Whx3F662KHarLZsv1jVL6jnHJn16',
    'appkey' => 'hfXHJrhHYpE503sSLMQQQGe2IELb1Ae8',
    'epi' => '2501103429',
    'txn_type' => 'sale',
    'amount' => 5,
    'cardnumber' => '4111111111111111',
    'expirydate' => 1236,
    'cvv' => 999,
    'cardholdername' => 'Michael Jordan',
    'invoicenumber' => 'inv0001',
    'orderdescription' => 'king size bed 10x12',
    'surchargeAmount' => 10.2,
    'surchargeIndicator' => 1,
    'address1' => '2 Jericho Plz',
    'city' => 'Jericho',
    'state' => 'NY',
    'shipping_country' => 'US',
    'billing_country' => 'US',
    'zip' => '50001',
    'customer_email' => '0',
    'customer_sms' => '1',
    'merchant_email' => '0'
  ]),
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', "HomeController@index")->name('home');
Route::get('/about', "HomeController@about")->name('about');
Route::get('/menu', "HomeController@menu")->name('menu');
Route::get('/menuSearch', "HomeController@menuSearch")->name('menuSearch');
Route::get('/categories', "HomeController@categories")->name('categories');
Route::get('/category/{id}', "HomeController@category")->name('category');
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