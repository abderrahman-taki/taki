<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\QuotationController;





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
    return redirect(route('home',app()->getlocale()));
});

Route::group(['prefix'=>'{language}'],function(){//language prefix

/**************************** NavBar ****************************/

Route::get('/',[NavBarController::class, 'Home'])->name('home');
Route::post('/',[NavBarController::class, 'NewsletterSTORE'])->name('storeemail');
Route::get('/Contact',[NavBarController::class, 'Contact'])->name('contact');
Route::get('/About',[NavBarController::class, 'About'])->name('about');
Route::get('/search', [NavBarController::class, 'searchIngredient'])->name('search');

/***************************** All Food ******************/
Route::get('/allMeals',[NavBarController::class, 'moreFood'])->name('all_meals');
Route::get('/allMeals/{id}',[NavBarController::class, 'moreFoodCategory'])->name('all_meals_category');

/***************************** Food Detail ******************/
Route::get('/meal/{slug}',[FoodController::class, 'MealPage'])->name('detailMeal');

/**************************** Packs **************************/
Route::get('/ourPacks',[NavBarController::class, 'AllPacksPage'])->name('packs');
Route::get('/ourPacks/{slug}',[NavBarController::class, 'PacksPage'])->name('packDetail');
Route::post('/ourPacks',[FoodController::class, 'storePack'])->name('storePack');
Route::get('onlinePaymentPack/{orderPackId}',[FoodController::class, 'onlinePaymentPackPage'])->name('onlinePaymentPack');
Route::get('/onlinePaymentPack/payment_success/{orderId}',[FoodController::class, 'PaymentSuccessPack'])->name('paymentSuccessPack');

/***************************** Add To Cart ******************/
Route::post('/meal',[FoodController::class, 'addToCartMeal'])->name('addToCart');
Route::get('/myListCart',[FoodController::class, 'myListCart'])->name('listCart');
Route::post('/myListCart',[FoodController::class, 'myListCartStore'])->name('storeOrder');
Route::get('onlinePayment/{orderId}',[FoodController::class, 'onlinePaymentPage'])->name('onlinePayment');
Route::get('/onlinePayment/payment_success/{orderId}',[FoodController::class, 'PaiementSuccess'])->name('paymentSuccess');
Route::get('/myListCart/removeItem/{id}',[FoodController::class, 'RemoveItem'])->name('removeItem');

/***************************** Customize Food ******************/
Route::get('/customizeMeal',[FoodController::class, 'CustomizePage'])->name('cutomize_meals');
Route::post('/storeCustomizeMeal',[FoodController::class, 'CustomSTORE'])->name('storeCustomizeMeal');
Route::get('/Customize/payment/{hash}',[FoodController::class, 'CustomizePayment'])->name('paymentCustomize');
Route::get('/Customize/payment_success/{id}',[FoodController::class, 'paymentSuccessCustom'])->name('paymentSuccessCustom');

});
