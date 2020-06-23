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

//Admin Routes

//gets
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('showAdminLogin');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/newCurso', 'AdminController@addCursoView')->name('newCurso');
Route::get('/newDoncente', 'AdminController@addDocenteView')->name('newDocente');
Route::get('/crudCursos', 'AdminController@cursosCrudView')->name('cursosCrud');



//post
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('AdminLogin');
Route::post('/upload/docente', 'AdminController@uploadDocente')->name('uploadDocente');






//Cursos Routes
Route::get('/api/cursos', 'CursosController@getCursos')->name('getCursos');


//Docentes Routes
Route::get('/docentes', 'Docente\DocenteController@getDocentesView')->name('getDocentesView');
Route::get('/docentesTables', 'Docente\DocenteController@getDocentesDatatables')->name('getDocentesTables');




Auth::routes();


