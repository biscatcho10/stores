<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// use Mcamara\LaravelLocalization\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


//note that the prefix is admin for all file route

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    // Admin login
    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {
        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
    });

    // Dashborad
    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

        // Dashboard index
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        // Logout
        Route::get('logout', 'LoginController@logout')->name('admin.logout');

        ########################## Start Settings Routes ###########################
        Route::group(['prefix' => 'settings'], function () {
            Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shippings.methods');
            Route::put('shipping-methods/{id}', 'SettingsController@updateShippingMethods')->name('update.shippings.methods');
        });
        ########################## End Settings Routes ##############################


        ############################ Start Profile Routes ###########################
        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
            Route::put('update', 'ProfileController@updateprofile')->name('update.profile');
        });
        ############################ End Profile Routes ##############################


        ################################ Start Categories Routes #############################
        Route::group(['prefix' => 'main_categories'], function () {
            Route::get('/','MainCategoriesController@index') -> name('admin.maincategories');
            Route::get('create','MainCategoriesController@create') -> name('admin.maincategories.create');
            Route::post('store','MainCategoriesController@store') -> name('admin.maincategories.store');
            Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
            Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');
            Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.maincategories.delete');
        });
        ############################### End Categories Routes #################################

        ############################## Start Sub Categories Routes ############################
           Route::group(['prefix' => 'sub_categories'], function () {
            Route::get('/','SubCategoriesController@index') -> name('admin.subcategories');
            Route::get('create','SubCategoriesController@create') -> name('admin.subcategories.create');
            Route::post('store','SubCategoriesController@store') -> name('admin.subcategories.store');
            Route::get('edit/{id}','SubCategoriesController@edit') -> name('admin.subcategories.edit');
            Route::post('update/{id}','SubCategoriesController@update') -> name('admin.subcategories.update');
            Route::get('delete/{id}','SubCategoriesController@destroy') -> name('admin.subcategories.delete');
        });
        ################################ End Categories Routes #################################

        ############################# Start Brands Routes ######################################
         Route::group(['prefix' => 'brands'], function () {
            Route::get('/','BrandsController@index') -> name('admin.brands');
            Route::get('create','BrandsController@create') -> name('admin.brands.create');
            Route::post('store','BrandsController@store') -> name('admin.brands.store');
            Route::get('edit/{id}','BrandsController@edit') -> name('admin.brands.edit');
            Route::post('update/{id}','BrandsController@update') -> name('admin.brands.update');
            Route::get('delete/{id}','BrandsController@destroy') -> name('admin.brands.delete');
        });
        ################################## End Brands Routes ####################################

        ################################## Start Tags Routes ####################################
        Route::group(['prefix' => 'tags'], function () {
        Route::get('/','TagsController@index') -> name('admin.tags');
        Route::get('create','TagsController@create') -> name('admin.tags.create');
        Route::post('store','TagsController@store') -> name('admin.tags.store');
        Route::get('edit/{id}','TagsController@edit') -> name('admin.tags.edit');
        Route::post('update/{id}','TagsController@update') -> name('admin.tags.update');
        Route::get('delete/{id}','TagsController@destroy') -> name('admin.tags.delete');
        });
        ################################## End Tags Routes #######################################

        ################################## Start Products Routes ####################################
        Route::group(['prefix' => 'products'], function () {
        Route::get('/','ProductsController@index') -> name('admin.products');
        Route::get('general-infromtion','ProductsController@create') -> name('admin.products.general.create');
        Route::post('store-general-infromtion','ProductsController@store') -> name('admin.products.general.store');
        Route::get('edit/{id}','ProductsController@edit') -> name('admin.products.edit');
        Route::post('update/{id}','ProductsController@update') -> name('admin.products.update');
        Route::get('delete/{id}','ProductsController@destroy') -> name('admin.products.delete');
        });
        ################################## End Products Routes #######################################



    });
});
