<?php

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


Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('showAdminLogin');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/crudCursos', 'CursoAdminCrud@index')->name('cursosCrud');
Route::get('/api/cursos', 'CursoAdminCrud@getCursos')->name('getCursos');

Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('AdminLogin');


Auth::routes();


