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

Route::get('/', 'PageControllers@welcome')->name('welcome');;

Route::get('/order/{premade_select?}','PageControllers@order');

Route::get('/checkout/{premade_select}', 'PageControllers@checkout');

Route::get('/build/{build_step?}/{selection?}', 'PageControllers@build');

Route::post('/charge', 'PaymentControllers@charge');

Route::get('/thank-you', 'PageControllers@thankyou')->name('thank-you');;

Route::get('/admin', 'AdminControllers@dashboard')->middleware('auth')->name('admin');

Route::get('/admin/dashboard', function(){return redirect('/admin');})->middleware('auth')->name('dashboard');

Route::get('/admin/lab', 'AdminControllers@lab')->middleware('auth')->name('lab');

Route::post('/admin/lab/update-premade', 'AdminControllers@updatePremade');

Auth::routes();

Route::get('/register', function(){
  return redirect('/');
});
