<?php

use App\Http\Livewire\AsignarController;
use App\Http\Livewire\CashoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoriesController;
use App\Http\Livewire\CoinsController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\PosController;
use App\Http\Livewire\ProductsController;
use App\Http\Livewire\ReportsController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\UsersController;
use Spatie\Permission\Contracts\Permission;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('categories', CategoriesController::class)->name('categorias');
Route::get('products', ProductsController::class)->name('productos');
Route::get('coins', CoinsController::class)->name('coins');
Route::get('pos', PosController::class)->name('ventas');
Route::get('roles', RolesController::class)->name('roles');
Route::get('permissions', PermisosController::class)->name('permisos');
Route::get('asignar', AsignarController::class)->name('asignar');
Route::get('users', UsersController::class)->name('usuarios');
Route::get('cashout', CashoutController::class)->name('corteCaja');
Route::get('report', ReportsController::class)->name('reportes');
