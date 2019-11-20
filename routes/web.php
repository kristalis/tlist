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


Route::get('/', 'AdminController@index')->name('home');

Route::get('/lists/dashboard', 'TasklistController@dashboard');
Auth::routes();
Route::get('user/{id}/tasklists','UserController@index')->where('id', '[0-9]+');
Route::get('user/{id}/completed','UserController@completedtask')->where('id', '[0-9]+');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('invite', 'InviteController@invite')->name('invite');
Route::post('invite', 'InviteController@process')->name('process');
// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'InviteController@accept')->name('accept');

Route::prefix('admin')->group(function() {
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
// Password reset routes
Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});


Route::resource ('/lists', 'TasklistController'); 
Route::resource ('/dioceses', 'DioceseController'); 
Route::resource ('/branches', 'BranchController'); 
Route::resource ('/branchs', 'BranchController'); 