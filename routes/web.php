<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaintCalculatorController;

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
    return view('welcome');
});

Route::get('/paint-calculator', function () {
    return view('paint-calculator');
})->middleware(['auth', 'verified'])->name('paint-calculator');


Route::post('/paint-calculator/calculate', [PaintCalculatorController::class, 'calculate'])
          ->name('paint-calculator.calculate');





require __DIR__.'/auth.php';
