<?php

use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\ConvertersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResolvePathController;
use App\Livewire\Installer;
use App\Livewire\Uploader;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

# must come first other wise /{path} will be executed
Route::get('/install', Installer::class)->name('installer');
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'installer',
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [ContactPageController::class, 'index'])->name('contact');
    Route::get('/blog', [BlogPageController::class, 'index'])->name('blog');
    Route::post('/upload', [Uploader::class, 'save'])->name('upload');
    Route::get('/download', [Uploader::class, 'download'])->name('download');
    Route::get('/download-zip', [Uploader::class, 'downloadZip'])->name('downloadZip');
    Route::get('/{path}', [ResolvePathController::class, 'resolve'])->name('resolver');
});