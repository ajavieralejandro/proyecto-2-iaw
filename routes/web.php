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


//Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);

Route::get('/', 'HomeController@welcome')->name('welcome');
//Route::get('/home', 'HomeController@index')->name('home');

//Admin Routes
Route::middleware(['auth:admin'])->group(function () {
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/newDoncente', 'AdminController@addDocenteView')->name('newDocente');

//Docentes Routes
Route::get('/docentes', 'Docente\DocenteController@getDocentesView')->name('getDocentesView');
Route::get('/editDocente/{id}', 'Docente\DocenteController@editDocenteView')->name('editDocentesView');
Route::get('/docentesTables', 'Docente\DocenteController@getDocentesDatatables')->name('getDocentesTables');
Route::get('/docente/{id}', 'Docente\DocenteController@getDocenteView')->name('getDocenteView');
Route::put('/editdocente','Docente\DocenteController@updateDocente')->name('updateDocente');
Route::delete('/deleteDocente','Docente\DocenteController@deleteDocente')->name('deleteDocente');
Route::post('/upload/docente', 'Docente\DocenteController@addDocente')->name('uploadDocente');



//Cursos Routes
Route::get('/newCurso', 'AdminController@addCursoView')->name('newCurso');
Route::get('/crudCursos', 'Curso\CursoController@getCursosView')->name('cursosCrud');
Route::post('/addCurso','Curso\CursoController@addCurso')->name('addCurso');
Route::get('/CursoAdmin/{id}','Curso\CursoController@viewCursoAdmin')->name('viewCursoAdmin');
Route::get('/cursosTables', 'Curso\CursoController@getCursosDatatables')->name('getCursosTables');
Route::delete('/deleteCurso','Curso\CursoController@deleteCurso')->name('deleteCurso');
Route::get('/editCurso/{id}', 'Curso\CursoController@editCursoView')->name('editCursoView');
Route::get('/addModulosCurso/{id}', 'Curso\CursoController@addModulosCursoView')->name('addModulosCursoView');
Route::put('/editCurso','Curso\CursoController@editCurso')->name('updateCurso');


//Modulos Routes
Route::post('/addModulo','ModuloCurso\ModuloCursoController@addModulo')->name('addModulo');
Route::get('/addModulo/{id}', 'ModuloCurso\ModuloCursoController@addModuloView')->name('addModuloView');
Route::get('/getModulosView/{id}', 'ModuloCurso\ModuloCursoController@getModulosView')->name('getModulosView');
Route::get('/getModulosTables/{id}', 'ModuloCurso\ModuloCursoController@getModulosTables')->name('getModulosTables');
Route::get('/modulo/{id}', 'ModuloCurso\ModuloCursoController@getModuloView')->name('getModuloView');
Route::get('/editmodulo/{id}', 'ModuloCurso\ModuloCursoController@editModuloView')->name('editModuloView');
Route::put('/editModulo','ModuloCurso\ModuloCursoController@editModulo')->name('editModulo');
Route::delete('/deleteModulo','ModuloCurso\ModuloCursoController@deleteModulo')->name('deleteModulo');


}
);

//user auth midleware
Route::middleware(['auth:web'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user', 'User\UserController@viewUser')->name('viewUser');
    Route::get('/editUser', 'User\UserController@editUser')->name('editUser');
    Route::put('/editUser', 'User\UserController@editUserPut')->name('editUserPut');
    Route::get('/addCurso/{id}', 'User\UserController@addCurso')->name('addCurso');
    Route::get('/userCursos', 'User\UserController@getUserCursosView')->name('getUserCursosView');

    Route::post('/addComentario', 'Comentario\ComentarioController@addComentario')->name('addComentario');





});

//gets
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('showAdminLogin');
Route::get('/Curso/{id}','Curso\CursoController@viewCurso')->name('viewCurso');



//post
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('AdminLogin');
//Route::post('/upload/docente', 'AdminController@uploadDocente')->name('uploadDocente');















Auth::routes();


