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

# View all items
Route::get('/tests', 'TestController@index')->name('p3.index');

# Display form to add a new item
Route::get('/tests/create', 'TestController@create')->name('p3.create');


# Process form to add a new item
Route::post('/tests', 'TestController@store')->name('p3.store');

#Display an individual item
Route::get('/tests/{item}', 'TestController@show')->name('p3.show');

#Display form to edit an individual item
Route::get('/tests/{item}/edit', 'TestController@edit')->name('p3.edit');
#process form to save edits to an individual item

Route::put('/tests/{item}', 'TestController@update')->name('p3.update');

#Delete an individual book
Route::delete('/tests/item', 'TestController@destroy')->name('p3.destroy');

Route::get('/contact', 'PageController@contact')->name('contact');

Route::get('/help', 'PageController@help')->name('help');

Route::get('/', function () {
    return view('welcome');
});

#make it so the logs can be seen only locally
if(App::environment() == 'local') {
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}


# various practice routes
Route::get('/debugbar', function() {
    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out...');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';
});

Route::get('/test', function() {
        $camel = "funny people";
        $teststring = config('mail.driver');
        echo $teststring;
        //echo e('<html>foontime</html>');
        //return $camel;
        //echo e($teststring);
});

Route::get('/practice', 'PracticeController@index')->name('practice.index');
for ($i=0; $i<100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}

//Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/random', function() {

    $random = new Randomizer();
    return $random->getRandomString(10);
});

Route::get('/example', function() {
    return App::environment();
});

#test this and then remove
/*Route::post('/books/create', function() {
    dd(Request::all());
});*/
