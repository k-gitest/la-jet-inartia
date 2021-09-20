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

//ミドルウェアでのグループ化
//複数のグループ化を一括で設定も出来るのでURIも考えて設計した方が良い
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function(){
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    Route::get('/menu' , function(){
        return Inertia::render('Menu');//inertiaではrenderメソッドでルーティング指定する
    })->name('menu');
    
    //プレフィックスでグループ化
    Route::prefix('menu')->group(function(){
        Route::get('show' , function(){
            return Inertia::render('Menu/Show');
        })->name('menu.show');
        
        Route::get('edit' , 
        function(){
            return Inertia::render('Menu/Edit');
        })->name('menu.edit');
        
    });
    
    Route::get('/secret/secret' , function(){
        return Inertia::render('Secret/Secret');
    })->name('secret');
    
});



//ミドルウェアルーティングにsanctum使用の名前付けルーティング
/*
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
*/
