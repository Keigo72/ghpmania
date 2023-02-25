<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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
    return view('toppage.index');
});

// Auth::routes();

// Auth::routes(['verify' => true]);

// Route::middleware('verified')->group(function() {
// //メール認証が完了した場合のみ、実行できるRoute
// });

Route::get('/mypage', [HomeController::class, 'mypage']);
Route::get('/question', [QuestionController::class, 'question']);
Route::get('/question/post', [QuestionController::class, 'question_post']);
Route::post('/question/post', [QuestionController::class, 'question_create']);

Route::controller(HomeController::class)->prefix('mypage')->name('mypage.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('mypage');
});

Route::controller(QuestionController::class)->prefix('question')->name('question.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/post', 'post')->name('post');
    Route::post('/post', 'create')->name('create');
});
// Route::get('/mypage', 'HomeController@add')->name('mypage');
// Route::get('/question', 'QuestionController@add')->name('question');
// Route::get('/question/post', 'QuestionController@post')->name('question_post');
// Route::post('/question/post', 'QuestionController@create')->name('question_create');


//Route::group(['middleware'=>'admin'], function () {
//    Route::get('/admin', 'Admin\UserController@index')->name('admin.users');
//});  これが↓になる
Route::controller(UserController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('users');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
