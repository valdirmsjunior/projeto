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

        return redirect('/administracao');
    }
});

Route::group(['middleware' => ['auth', 'verified'], 'namespace' => 'App\Http\Controllers'], function(){

    

    Route::prefix('administracao')->namespace('Admin')->group(function () {

        // HOME
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        // USUARIOS
        Route::prefix('usuarios')->name('admin.usuarios.')->middleware(['can:admin'])->group(function() {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/cadastro', 'UserController@create')->name('create');
            Route::post('/', 'UserController@store')->name('store');
            Route::get('/{usuario}/edicao', 'UserController@edit')->name('edit');
            Route::put('/{usuario}', 'UserController@update')->name('update');
            Route::delete('/{usuario}/delete', 'UserController@destroy')->name('destroy');
        });

        //VAGAS
        Route::prefix('vagas')->name('admin.vagas.')->middleware(['can:admin'])->group(function() {
            Route::get('/', 'VagaController@index')->name('index');
            Route::get('/cadastro-vagas', 'VagaController@create')->name('create');
            Route::post('/', 'VagaController@store')->name('store');
            Route::get('/{vaga}/edicao', 'VagaController@edit')->name('edit');
            Route::put('/{vaga}', 'VagaController@update')->name('update');
            Route::delete('/{vaga}/delete', 'VagaController@destroy')->name('destroy');
        });
    });

    //AREA DO CANDIDATO
    Route::prefix('candidato')->namespace('Usuario')->group(function () {
        // COMITE HOME
        Route::get('/', 'HomeController@index')->name('usuarios.index')->middleware('can:usuario');
    });
});



require __DIR__.'/auth.php';
