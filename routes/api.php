<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubBrandController;
use App\Http\Controllers\SubBrandVariationController;
use App\Http\Controllers\SubBrandDetailsController;
use App\Http\Controllers\SubBrandDetailVariationController;
use App\Http\Controllers\MallController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\SellingIdentityController;
use App\Http\Controllers\NewShopController;
use App\Http\Controllers\UsedShopController;
use App\Http\Controllers\OtherMallController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ADClientController;
use App\Http\Controllers\CreateADController;
use App\Http\Controllers\ADScheduleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\LogisticChargeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//FLOOR
Route::get('/floors',[FloorController::class,'index']);
Route::post('/create_floor',[FloorController::class,'store']);
Route::get('/get_single_floor/{id}',[FloorController::class,'show']);
Route::put('/update_floor/{id}',[FloorController::class,'update']);

// PRODUCT
Route::get('/products',[ProductController::class,'index']);
Route::post('/create_product',[ProductController::class,'store']);
Route::get('/single_product/{id}',[ProductController::class,'show']);
Route::put('/update_product/{id}',[ProductController::class,'update']);

// PRODUCT CATEGORY
Route::get('/product_categories',[ProductCategoryController::class,'index']);
Route::post('/create_product_category',[ProductCategoryController::class,'store']);
Route::get('/single_product_category/{id}',[ProductCategoryController::class,'show']);
Route::put('/update_product_category/{id}',[ProductCategoryController::class,'update']);

// BRAND
Route::get('/brands',[BrandController::class,'index']);
Route::post('/create_brand',[BrandController::class,'store']);
Route::get('/single_brand/{id}',[BrandController::class,'show']);
Route::put('/update_brand/{id}',[BrandController::class,'update']);

// SUB BRAND
Route::get('/sub_brands',[SubBrandController::class,'index']);
Route::post('/create_sub_brand',[SubBrandController::class,'store']);
Route::get('/single_sub_brand/{id}',[SubBrandController::class,'show']);
Route::put('/update_sub_brand/{id}',[SubBrandController::class,'update']);

// SUB BRAND VARIATION
Route::post('/create_sub_brand_variation',[SubBrandVariationController::class,'store']);
Route::get('/sub_brand_variations/{GUID}',[SubBrandVariationController::class,'show']);
Route::put('/update_sub_brand_variations/{GUID}',[SubBrandVariationController::class,'update']);

// SUB BRAND DETAILS
Route::get('/sub_brand_details',[SubBrandDetailsController::class,'index']);
Route::post('/create_sub_brand_details',[SubBrandDetailsController::class,'store']);
Route::get('/single_sub_brand_detail/{id}',[SubBrandDetailsController::class,'show']);
Route::put('/update_sub_brand_detail/{id}',[SubBrandDetailsController::class,'update']);

// SUB BRAND DETAIL VARIATION
Route::post('/create_sub_brand_detail_variation',[SubBrandDetailVariationController::class,'store']);
Route::get('/sub_brand_detail_variations/{GUID}',[SubBrandDetailVariationController::class,'show']);

// MALL
Route::get('/malls',[MallController::class,'index']);
Route::post('/create_mall',[MallController::class,'store']);
Route::get('/single_mall/{id}',[MallController::class,'show']);
Route::put('/update_mall/{id}',[MallController::class,'update']);

// MERCHANT
Route::get('/merchants',[MerchantController::class,'index']);
Route::post('/create_merchant',[MerchantController::class,'store']);
Route::get('/single_merchant/{id}',[MerchantController::class,'show']);
Route::put('/update_merchant/{id}',[MerchantController::class,'update']);

// SELLING IDENTITY
Route::get('/selling_identities',[SellingIdentityController::class,'index']);
Route::post('/create_selling_identity',[SellingIdentityController::class,'store']);
Route::get('/single_selling_identity/{id}',[SellingIdentityController::class,'show']);
Route::put('/update_selling_identity/{id}',[SellingIdentityController::class,'update']);

// NEW SHOP
Route::get('/new_shops',[NewShopController::class,'index']);
Route::post('/create_new_shop',[NewShopController::class,'store']);
Route::get('/single_new_shop/{id}',[NewShopController::class,'show']);
Route::put('/update_new_shop/{id}',[NewShopController::class,'update']);

// USED SHOP
Route::get('/used_shops',[UsedShopController::class,'index']);
Route::post('/create_used_shop',[UsedShopController::class,'store']);
Route::get('/single_used_shop/{id}',[UsedShopController::class,'show']);
Route::put('/update_used_shop/{id}',[UsedShopController::class,'update']);

// OTHER MALL SHOP
Route::get('/other_malls',[OtherMallController::class,'index']);
Route::post('/create_other_mall',[OtherMallController::class,'store']);
Route::get('/single_other_mall/{id}',[OtherMallController::class,'show']);
Route::put('/update_other_mall/{id}',[OtherMallController::class,'update']);

// PROMOTION/UPDATE
Route::get('/promotions',[PromotionController::class,'index']);
Route::post('/create_promotion',[PromotionController::class,'store']);
Route::get('/single_promotion/{id}',[PromotionController::class,'show']);
Route::put('/update_promotion/{id}',[PromotionController::class,'update']);

// VOUCHER
Route::get('/vouchers',[VoucherController::class,'index']);
Route::post('/create_voucher',[VoucherController::class,'store']);
Route::get('/single_voucher/{id}',[VoucherController::class,'show']);
Route::put('/update_voucher/{id}',[VoucherController::class,'update']);

// AD CLIENT
Route::get('/ad_clients',[ADClientController::class,'index']);
Route::post('/create_ad_client',[ADClientController::class,'store']);
Route::get('/single_ad_client/{id}',[ADClientController::class,'show']);
Route::put('/update_ad_client/{id}',[ADClientController::class,'update']);

// CREATE AD
Route::get('/ads',[CreateADController::class,'index']);
Route::post('/create_ad',[CreateADController::class,'store']);
Route::get('/single_ad/{id}',[CreateADController::class,'show']);
Route::put('/update_ad/{id}',[CreateADController::class,'update']);

// AD SCHEDULE
Route::get('/ad_schedules',[ADScheduleController::class,'index']);
Route::post('/create_ad_schedule',[ADScheduleController::class,'store']);
Route::get('/single_ad_schedule/{id}',[ADScheduleController::class,'show']);
Route::put('/update_ad_schedule/{id}',[ADScheduleController::class,'update']);

// MANAGE ADMIN
Route::get('/admins',[AdminController::class,'index']);
Route::post('/create_admin',[AdminController::class,'store']);
Route::get('/single_admin/{id}',[AdminController::class,'show']);
Route::put('/update_admin/{id}',[AdminController::class,'update']);

// LOGISTIC
Route::get('/logistics',[LogisticController::class,'index']);
Route::post('/create_logistic',[LogisticController::class,'store']);
Route::get('/single_logistic/{id}',[LogisticController::class,'show']);
Route::put('/update_logistic/{id}',[LogisticController::class,'update']);

// LOGISTIC CHARGES
Route::get('/logistic_charges/{GUID}',[LogisticChargeController::class,'show']);
Route::post('/create_logistic_charge',[LogisticChargeController::class,'store']);
Route::put('/update_logistic_charge/{id}',[LogisticChargeController::class,'update']);

//IMAGE MASTER api
Route::post('/upload',[FileUploadController::class,'upload']);
