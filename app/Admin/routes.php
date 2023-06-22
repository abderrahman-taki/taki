<?php

use App\Admin\Controllers\PostController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('ingredients', IngredientController::class);
    $router->resource('breakfasts', BreakfastController::class);
    $router->resource('carts', CartController::class);
    $router->resource('customizes', CustomizeController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('days', DayController::class);
    $router->resource('dinners', DinnerController::class);
    $router->resource('food', FoodController::class);
    $router->resource('food-ingredients', FoodIngredientController::class);
    $router->resource('lunches', LunchController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('orders-carts', OrdersCartController::class);
    $router->resource('packs', PackController::class);
    $router->resource('pack-orders', PackOrderController::class);
    $router->resource('clients', ClientController::class);
    $router->resource('posts', PostController::class);
});
