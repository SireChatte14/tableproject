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
use App\Mail\ConfirmUser;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});

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
        Route::resource('TableEdit', 'tableSetUpController');
        Route::resource('fullcalendar', 'FullCalendarController');
        Route::resource('User', 'UserController');
        Route::get('/load-events','Eventcontroller@loadEvents')->name('routeLoadEvents');
        Route::put('/event-update','Eventcontroller@update')->name('routeEventUpdate');
        Route::post('/event-store','Eventcontroller@store')->name('routeEventStore');
        Route::delete('/event-delete','Eventcontroller@destroy')->name('routeEventDelete');

    });
  });
});

Route::group(["prefix"=> "confirmation","middleware"=>"auth"],function(){

    Route::name('confirmation.')->group(function(){

    Route::post('entry/{entry}', 'ConfirmationsController@entry')->name('entry');
});
});


Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::view('index','index');

Route::view('speisekarte','speisekarte');

Route::view('impressum','impressum');

Route::view('datenschutz','datenschutz');

Route::get('/MenuCard', 'MenuCardController@index');

Route::view('tablebook','tablebook');

Route::post('submit','EntryController@save');

Route::view('adminArea','adminArea');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
       API Routes
*/

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('pages', 'PagesController', array('only' => array('index', 'store', 'show', 'update', 'destroy')));
    Route::resource('users', 'UsersController');
});



