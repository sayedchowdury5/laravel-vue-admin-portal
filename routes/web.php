<?php

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

Route::get('/', function () {
    return view('floor');
});
Route::get('/products', function () {
    return view('products');
});
Route::get('/products-category', function () {
    return view('products_category');
});
Route::get('/brand', function () {
    return view('brand');
});
Route::get('/sub-brand', function () {
    return view('sub_brand');
});
Route::get('/mall', function () {
    return view('mall');
});
Route::get('/merchant', function () {
    return view('merchant');
});
Route::get('/selling-identity', function () {
    return view('selling_identity');
});
Route::get('/new-shop', function () {
    return view('new_shop');
});
Route::get('/used-shop', function () {
    return view('used_shop');
});
Route::get('/other-mall-shop', function () {
    return view('other_mall_shop');
});
Route::get('/promotion-update', function () {
    return view('promotion_update');
});
Route::get('/voucher', function () {
    return view('voucher');
});
Route::get('/ad-client', function () {
    return view('ad_client');
});
Route::get('/create-ads', function () {
    return view('create_ads');
});
Route::get('/ad-schedule', function () {
    return view('ad_schedule');
});
Route::get('/manage-admin', function () {
    return view('manage_admin');
});
Route::get('/logistic', function () {
    return view('logistic');
});
Route::get('/sub-brand-details', function () {
    return view('sub_brand_details');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
