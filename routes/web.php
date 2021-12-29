<?php
use App\Http\Controllers\binController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/product', [productController::class, 'index'])->name('product');
Route::post('/product/add', [productController::class, 'store'])->name('addproduct');
Route::get('/product/delete/{id}', [productController::class, 'delete']);

Route::get('/manager', [managerController::class, 'index'])->name('manager');
Route::post('manager/add', [managerController::class, 'addToCart'])->name('store');
Route::post('manager/remove', [managerController::class, 'removeCart'])->name('remove');
Route::post('clear', [managerController::class, 'clearAllCart'])->name('clear');

Route::post('/manager/addstudent', [managerController::class, 'store'])->name('addlist');

Route::get('/slip', [binController::class, 'index'])->name('slipall');
