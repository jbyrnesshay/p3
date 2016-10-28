<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

 
# route for home page view 
Route::get('/', function () { 
    return view('welcome');
})->name('welcome');

# route for user generate page */
Route::get('/usergen', function() {
    return view('/lorem/usergen');
})->name('usergen');

# route for create lorem ipsum page 
Route::get('/lorem', function() {
    return view('/lorem/lorem'); 
})->name('lorem');

# process lorem ipsum
Route::post('/lorem', 'LoremController@getLoremIpsumText')->name('lorem.process');

# process user generation
Route::post('/usergen', 'UsergenController@generateUsers')->name('user.process');
 

# make it so the logs can be seen only locally
if (App::environment() == 'local') {
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}


 