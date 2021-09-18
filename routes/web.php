<?php
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\TestinputController;
//コントローラーを追加したらuseする
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
Route::get('/menu/menu' , [MenuController::class, 'menu']);
Route::get('/menu/edit' , [TestinputController::class , 'edit'])->name('menu.edit');//名前付けルーティング
Route::get('/menu/show' , [TestinputController::class , 'show'])->name('menu.show');
Route::get('/secret/secret' , [MenuController::class, 'secret'])->name('secret');
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//ミドルウェアルーティングにsanctum使用の名前付けルーティング
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return Inertia::render('Dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum' , 'verified'])->get('/menu' , 
    function(){
        return Inertia::render('Menu');//inertiaではrenderメソッドでルーティング指定する
    }
)->name('menu');

Route::middleware(['auth:sanctum' , 'verified'])->get('/menu/show' , 
    function(){
        return Inertia::render('Menu/Show');//inertiaではrenderメソッドでルーティング指定する
    }
)->name('menu.show');

Route::middleware(['auth:sanctum' , 'verified'])->get('/menu/edit' , 
    function(){
        return Inertia::render('Menu/Edit');//inertiaではrenderメソッドでルーティング指定する
    }
)->name('menu.edit');

Route::middleware(['auth:sanctum' , 'verified'])->get('/secret/secret' , 
    function(){
        return Inertia::render('Secret/Secret');//inertiaではrenderメソッドでルーティング指定する
    }
)->name('secret');

