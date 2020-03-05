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

use App\Mail\WelcomeUser;

Route::view('/','welcome');

Route::get('/email', function (){
    $user = Auth::User();
    Mail::to('email@email.com')->send(new WelcomeUser($user));
});



// Admin Routes > Middelware "auth"

Route::prefix('admin')->group (function()
{
  Route::name('admin.')->group(function()
  {
    Route::middleware('auth')->group (function()
    {
      Route::get('/', function ()
      {
        return view('admin');
      });

        Route::resource('TableBook', 'AdminTablecontroller');
        Route::resource('MenuEdit', 'AdminMenucontroller');
        Route::resource('Calendar', 'CalendarController');
        Route::resource('CalendarDay', 'CalendarDayController');
        Route::resource('TableEdit', 'tableSetUpController');
    });
  });
});


Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::view('tablebook','tablebook');

Route::view('index','index');

Route::view('impressum','impressum');

Route::view('datenschutz','datenschutz');

Route::get('/MenuCard', 'MenuCardController@index');

Route::view('tablebook','tablebook');

Route::post('submit','EntryController@save');

Route::view('adminArea','adminArea');
