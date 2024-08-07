<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\SacerdoteController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BautismoController;
use App\Http\Controllers\ComunionController;
use App\Http\Controllers\ConfirmacionController;
use App\Http\Controllers\MatrimonioController;
use App\Http\Controllers\SacramentoController;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/', [HomeController::class, 'index']); //Pantalla principal del cliente
Route::get('/home', [HomeController::class, 'index']); //Pantalla principal del cliente

Route::get('/inicio-sesion', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('inicio-sesion', [LoginController::class, 'login']);
Route::post('/cerrar-sesion', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin');

    Route::group(['prefix' => 'usuarios'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.admin');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/usuario/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/usuario/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/usuario/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::group(['prefix' => 'noticias'], function(){
        Route::get('/', [NoticiaController::class, 'index'])->name('news.admin');
        Route::post('/store', [NoticiaController::class, 'store'])->name('news.store');
        Route::get('/noticia/{noticia}/edit', [NoticiaController::class, 'edit'])->name('news.edit');
        Route::put('/noticia/{noticia}', [NoticiaController::class, 'update'])->name('news.update');
        Route::delete('/noticia/{noticia}', [NoticiaController::class, 'destroy'])->name('news.destroy');
    });

    Route::group(['prefix' => 'sacerdotes'], function () {
        Route::get('/', [SacerdoteController::class, 'index'])->name('priest.index');
        Route::post('/store', [SacerdoteController::class, 'store'])->name('priest.store');
        Route::get('/sacerdote/{sacerdote}/edit', [SacerdoteController::class, 'edit'])->name('priest.edit');
        Route::put('/sacerdote/{sacerdote}', [SacerdoteController::class, 'update'])->name('priest.update');
        Route::delete('/sacerdote/{sacerdote}', [SacerdoteController::class, 'destroy'])->name('priest.destroy');
        Route::post('/sacerdote/{id}/asignar-parroco', [SacerdoteController::class, 'asignarParroco'])->name('sacerdote.asignar-parroco');
        Route::post('/sacerdote/{id}/quitar-parroco', [SacerdoteController::class, 'quitarParroco'])->name('sacerdote.quitar-parroco');
    });

    Route::group(['prefix'=>'iglesias'], function(){
        Route::get('/', [ParroquiaController::class, 'index'])->name('church.index');
        Route::post('/store', [ParroquiaController::class, 'store'])->name('church.store');
        Route::get('/iglesia/{parroquia}/edit', [ParroquiaController::class, 'edit'])->name('church.edit');
        Route::put('/iglesia/{parroquia}', [ParroquiaController::class, 'update'])->name('church.update');
        Route::delete('/iglesia/{parroquia}', [ParroquiaController::class, 'destroy'])->name('church.destroy');
    });

    Route::group(['prefix'=>'servicios'], function(){
        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::post('/service/eliminar/{tipo}/{id}', [ServiceController::class, 'eliminar'])->name('service.eliminar');
        Route::get('/service/editar/{tipo}/{id}', [ServiceController::class, 'editar'])->name('service.editar');
        Route::post('/service/actualizar/{tipo}/{id}', [ServiceController::class, 'actualizar'])->name('service.actualizar');
        Route::get('/service-get-info', [ServiceController::class, 'getServiceInfo'])->name('service.get-info');
    });
});

/* Rutas para el apartado de sacramentos */
Route::group(['prefix'=>'sacramentos', 'middleware'=>'auth'], function(){
    Route::get('/', [HomeController::class, 'welcome'])->name('home');
    Route::get('/registro', [SacramentoController::class, 'search'])->name('list_registers');

    Route::group(['prefix'=>'busqueda'], function(){
        Route::get('/', [PersonaController::class, 'index'])->name('personas.index');
        Route::get('/personas/{id}/info', [PersonaController::class,'show'])->name('personas.show');
        Route::post('/persona/store', [PersonaController::class, 'store'])->name('personas.store');
        Route::get('/personas/{id}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
        Route::put('/personas/{id}', [PersonaController::class, 'update'])->name('personas.update');
        Route::delete('personas/{id}', [PersonaController::class, 'destroy'])->name('personas.destroy');
        Route::get('/info/{id}', [PersonaController::class, 'infoPerson'])->name('personas.info');
        Route::group(['prefix'=>'bautismos'], function(){
            Route::get('/{id}', [BautismoController::class, 'index'])->name('bautismo.index');
            Route::post('/bautismo/store', [BautismoController::class, 'store'])->name('bautismo.store');
            Route::put('/bautismo/update/{id}', [BautismoController::class,'update'])->name('bautismo.update');
            Route::delete('/bautismo/destroy/{id}', [BautismoController::class,'destroy'])->name('bautismo.destroy');
        });
        Route::group(['prefix'=>'comuniones'], function(){
            Route::get('/', [ComunionController::class, 'index'])->name('comunion.index');
            Route::post('/comunion/store', [ComunionController::class, 'store'])->name('comunion.store');
            Route::put('/comunion/update/{id}', [ComunionController::class,'update'])->name('comunion.update');
            Route::delete('/comunion/destroy/{id}', [ComunionController::class,'destroy'])->name('comunion.destroy');
        });
        Route::group(['prefix'=>'confirmaciones'], function(){
            Route::get('/', [ConfirmacionController::class, 'index'])->name('confirmacion.index');
            Route::post('/confirmacion/store', [ConfirmacionController::class, 'store'])->name('confirmacion.store');
            Route::put('/confirmacion/update/{id}', [ConfirmacionController::class,'update'])->name('confirmacion.update');
            Route::delete('/confirmacion/destroy/{id}', [ConfirmacionController::class,'destroy'])->name('confirmacion.destroy');
        });
        Route::group(['prefix'=>'matrimonios'], function(){
            Route::post('matrimonio/store/{id]', [MatrimonioController::class, 'store'])->name('matrimonio.store');
            Route::put('/matrimonio/update/{id}', [MatrimonioController::class,'update'])->name('matrimonio.update');
            Route::delete('/matrimonio/destroy/{id}', [MatrimonioController::class,'destroy'])->name('matrimonio.destroy');
        });

        Route::post('/generate-document', [SacramentoController::class, 'SacramentoController@generatePDF'])->name('print-list');
    });




});


Route::get('/buscar', [HomeController::class, 'busqueda'])->name('buscar');
