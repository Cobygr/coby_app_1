<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; //ユーザー登録する際のemailとpasswordをDBに保存するためのコントローラー


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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login1', function () {
    return view('login1');
})->name('login1');

// Route::get('/register1' , function(){
//     return view('register1');
// })->name('register1');

//Route::get: HTTPメソッドがGETの場合に実行されるルートを定義します。GETメソッドは、一般的にデータを取得するために使用されます。
//'/register1': ユーザーがブラウザのアドレスバーにこのURLを入力すると、このルートが呼び出されます。
//[UserController::class,'create']: ユーザーの登録画面を表示する処理を記述したUserControllerクラスのcreateメソッドが実行されます。
//->name('register'): このルートにregisterという名前を付けています。この名前は、他の部分でこのルートを呼び出す際に使用することができます。
Route::get('/register1', [UserController::class, 'create'])->name('register1');
//Route::post('/register1',[UserController::class,'store'])->name('register.store');
//Route::post: HTTPメソッドがPOSTの場合に実行されるルートを定義します。POSTメソッドは、一般的にサーバーにデータを送信するために使用されます。
//'/register1': 上記と同じく、このURLにアクセスすると、このルートが呼び出されます。
//[UserController::class,'store']: ユーザーの登録情報をデータベースに保存する処理を記述したUserControllerクラスのstoreメソッドが実行されます。
//->name('register.store'): このルートにregister.storeという名前を付けています。
Route::post('/register1', [UserController::class, 'store'])->name('register.store');
//つまりまとめると、/register1にアクセスすると、HTTP通信のGETにより/register1を表示し、ユーザーが入力した登録情報をDBに保存する処理がなされる


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
