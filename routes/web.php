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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users','Api\UserController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account_settings', 'HomeController@account_settings')->name('account_settings');
Route::post('/account_settings', 'HomeController@save_account_settings')->name('save_account_settings');

Route::get('/my_profile', 'HomeController@my_profile')->name('my_profile');

Route::get('/users', 'UserController@users')->name('users');
Route::get('/user/{id}/activate', 'UserController@activate')->name('activate');
Route::get('/user/{id}/deactivate', 'UserController@deactivate')->name('deactivate');

Route::get('/user/{id}/edit', 'UserController@edit')->name('edit');
Route::post('/user/{id}/edit', 'UserController@edit')->name('save_edit');

Route::get('/media', 'UploadsController@media')->name('media');
Route::post('/upload', 'UploadsController@store')->name('upload.store');
Route::get('/upload/destroy/{user_id}/{upload}', 'UploadsController@destroy');
Route::get('/media/get_table', 'UploadsController@get_table');

Route::get('/support', 'SupportTicketController@index');
Route::get('/support/ticket/{id}', 'SupportTicketController@ticket');
Route::get('/support/complete/ticket/{id}', 'SupportTicketController@complete');
Route::post('/support/replay/ticket/{id}', 'SupportTicketController@replayTicket');
Route::post('/support/new/ticket', 'SupportTicketController@newTicket');

