<?php
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\TestinputController;
//コントローラーを追加したらuseする
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/menu/menu' , [MenuController::class, 'menu']);
Route::get('/testinput/edit' , [TestinputController::class , 'edit'])->name('testinput.edit');
Route::get('/testinput/show' , [TestinputController::class , 'show'])->name('testinput.show');
Route::get('/secret/secret' , [MenuController::class, 'secret'])->name('secret');


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum'] , 'verified')->get('/menu/menu' , 
    function(){
        return view('menu/menu');
    }
)->name('menu');




