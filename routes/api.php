<?php

use GetCandy\Hub\Http\Livewire\Hub;
use GetCandy\Hub\Http\Livewire\Pages\Account;
use GetCandy\Hub\Http\Livewire\Pages\Authentication\Login;
use GetCandy\Hub\Http\Livewire\Pages\Authentication\PasswordReset;
use GetCandy\Hub\Http\Middleware\Authenticate;
use GetCandy\Hub\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => config('getcandy-api.system.route.prefix', 'api'),
    'middleware' => config('getcandy-api.system.route.middleware', ['api']),
], function () {

    Route::group([
        'prefix' => 'carts',
    ], __DIR__.'/includes/carts.php');

    Route::group([
        'prefix' => 'collections',
    ], __DIR__.'/includes/collections.php');

    Route::group([
        'prefix' => 'orders',
    ], __DIR__.'/includes/orders.php');

    Route::group([
        'prefix' => 'products',
    ], __DIR__.'/includes/products.php');

});

//
//$router->get('channels/{encoded_id}', '\GetCandy\Api\Core\Channels\Actions\FetchChannel');
//$router->get('categories/{id}', 'Categories\CategoryController@show');
//
///*
//* Customers
//*/
//$router->group([
//    'prefix' => 'customers',
//], function ($group) {
//    $group->get('{encoded_id}', '\GetCandy\Api\Core\Customers\Actions\FetchCustomer');
//    $group->put('{encoded_id}', '\GetCandy\Api\Core\Customers\Actions\UpdateCustomer');
//    $group->post('/', '\GetCandy\Api\Core\Customers\Actions\CreateCustomer');
//});
//
///*
//    * Categories
//    */
//$router->get('categories', 'Categories\CategoryController@index');
//$router->get('categories/{category}/children', 'Categories\CategoryController@children');
//
///*
//* Countries
//*/
//$router->get('countries', '\GetCandy\Api\Core\Countries\Actions\FetchCountries');
//
///*
//* Languages
//*/
//$router->group([
//    'prefix' => 'languages',
//], function ($group) {
//    $group->get('/', '\GetCandy\Api\Core\Languages\Actions\FetchLanguages');
//    $group->get('/{encoded_id}', '\GetCandy\Api\Core\Languages\Actions\FetchLanguage');
//});
//
///*
//    * Currencies
//    */
//$router->resource('currencies', 'Currencies\CurrencyController', [
//    'except' => ['edit', 'create'],
//]);
//
///*
//    * Orders
//    */
//
//$router->post('orders/process', 'Orders\OrderController@process');
//$router->post('orders/{id}/expire', 'Orders\OrderController@expire');
//$router->put('orders/{id}/shipping/address', 'Orders\OrderController@shippingAddress');
//// $router->put('orders/{id}/shipping/methods', 'Orders\OrderController@shippingMethod');
//$router->get('orders/{id}/shipping/methods', 'Orders\OrderController@shippingMethods');
//$router->put('orders/{id}/shipping/cost', 'Orders\OrderController@shippingCost');
//$router->put('orders/{id}/contact', 'Orders\OrderController@addContact');
//$router->put('orders/{id}/billing/address', 'Orders\OrderController@billingAddress');
//$router->get('orders/types', 'Orders\OrderController@getTypes');
//$router->post('orders/{id}/lines', 'Orders\OrderLineController@store');
//$router->delete('orders/lines/{id}', 'Orders\OrderLineController@destroy');
//
//$router->resource('orders', 'Orders\OrderController', [
//    'only' => ['store', 'show'],
//]);
//
///*
//    * Payments
//    */
//$router->post('payments/3d-secure', 'Payments\PaymentController@validateThreeD');
//$router->get('payments/provider', 'Payments\PaymentController@provider');
//$router->get('payments/providers', '\GetCandy\Api\Core\Payments\Actions\FetchProviders');
//$router->get('payments/providers/{handle}', '\GetCandy\Api\Core\Payments\Actions\FetchPaymentProvider');
//$router->get('payments/types', '\GetCandy\Api\Core\Payments\Actions\FetchPaymentTypes');
//
///*
//* Routes
//*/
//$router->group([
//    'prefix' => 'routes',
//], function ($route) {
//    $route->get('search', '\GetCandy\Api\Core\Routes\Actions\SearchForRoute');
//    $route->get('{encoded_id}', '\GetCandy\Api\Core\Routes\Actions\FetchRoute');
//});
//
//$router->get('search', '\GetCandy\Api\Core\Search\Actions\Search');
//
//// $router->get('search', 'Search\SearchController@search');
//// $router->get('search/sku', 'Search\SearchController@sku');
//// $router->get('search/products', 'Search\SearchController@products');
///*
//    * Shipping
//    */
//$router->get('shipping', '\GetCandy\Api\Core\Shipping\Actions\FetchShippingMethods');
//$router->get('shipping/prices/estimate', 'Shipping\ShippingPriceController@estimate');
//
///*
// * Users
// */
//$router->post('users', '\GetCandy\Api\Core\Users\Actions\CreateUser');
//
//$router->get('plugins', 'Plugins\PluginController@index');
