<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;





Auth::routes();

Route::get('/', [QrController::class, 'index'])->name('index');
Route::post('/qr_builder', [QrController::class, 'qr_builder'])->name('qr_builder');

Route::post('/qr_code_phone', [QrController::class, 'qr_phone'])->name('qr_phone');

Route::post('/qr_code_web', [QrController::class, 'qr_web'])->name('qr_web');

Route::get('/phonepage', [QrController::class, 'phonepage'])->name('phone_page');
Route::get('/webpage', [QrController::class, 'webpage'])->name('webpage');

Route::get('/wifipage', [QrController::class, 'wifi'])->name('wifipage');


