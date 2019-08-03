        <?php

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
        Auth:: routes(['verify' => true]);

        Route:: get('/', 'HomeController@index')->name('home');
        Route:: get('/category/{slug}', 'HomeController@showcategorylist')->name('category.list');
        Route:: get('/product/{slug}', 'HomeController@showproduct')->name('product.show');

        Route::get('/cart','CartController@ShowCart')->name('cart');
        Route::post('/cart','CartController@addToCart');
        Route::post('/cart/delete','CartController@deleteFromToCart')->name('cart.delete');
        Route::post('/cart/remove','CartController@removeFromToCart')->name('cart.remove');
        Route::get('/cart/clear','CartController@clearCart')->name('cart.clear');


        Route::get('/register', 'AuthController@RegistrationForm')->name('register');
        Route::post('/register', 'AuthController@RegistrationProcess')->name('register');

        Route::get('/login', 'AuthController@LoginForm')->name('login');
        Route::post('/login', 'AuthController@LoginProcess')-> name('login');



        Route::group(['middleware' => 'auth'], function (){
            Route::get('/logout', 'AuthController@logout')->name('logout');
            Route::get('/checkout','CartController@showCheckout')->name('checkout');
            Route::post('/checkout','CartController@processCheckout');


            Route:: get('/dashboard', 'DashboardController@ShowDashboard')-> name('dashboard');

            Route::group(['middleware' => 'admin'], function (){
                Route:: resource('/categories','CategoriesController');
                Route:: resource('/products','ProductsController');

            });

        });



