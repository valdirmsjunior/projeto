<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    //auto login quando estiver em local()
    if(app()->isLocal()) {
        auth()->loginUsingId(1);

        return to_route('dashboard');
    }

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'verified'], 'namespace' => 'App\Http\Controllers'], function(){

    // USUARIOS
    Route::prefix('usuarios')->name('admin.usuarios.')->group(function() {
        Route::get('/', 'Admin\UserController@index')->name('index');
        Route::get('/cadastro', 'Admin\UserController@create')->name('create');
        Route::post('/', 'Admin\UserController@store')->name('store');
        Route::get('/{usuario}/edicao', 'Admin\UserController@edit')->name('edit');
        Route::put('/{usuario}', 'Admin\UserController@update')->name('update');
        Route::delete('/{usuario}/delete', 'Admin\UserController@destroy')->name('destroy');
    });
});



require __DIR__.'/auth.php';
