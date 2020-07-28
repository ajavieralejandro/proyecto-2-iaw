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
Route::group(['middleware' => ['auth:admin']],function () {
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/newDoncente', 'AdminController@addDocenteView')->name('newDocente');

//Docentes Routes
Route::get('/admin/docentes', 'Docente\DocenteController@getDocentesView')->name('getDocentesView');
Route::get('/admin/editDocente/{id}', 'Docente\DocenteController@editDocenteView')->name('editDocentesView');
Route::get('/admin/docentesTables', 'Docente\DocenteController@getDocentesDatatables')->name('getDocentesTables');
Route::get('/admin/docente/{id}', 'Docente\DocenteController@getDocenteView')->name('getDocenteView');
Route::put('/admin/editdocente','Docente\DocenteController@updateDocente')->name('updateDocente');
Route::delete('/admin/deleteDocente','Docente\DocenteController@deleteDocente')->name('deleteDocente');
Route::post('/admin/upload/docente', 'Docente\DocenteController@addDocente')->name('uploadDocente');



//Cursos Routes
Route::get('/admin/newCurso', 'AdminController@addCursoView')->name('newCurso');
Route::get('/admin/crudCursos', 'Curso\CursoController@getCursosView')->name('cursosCrud');
Route::post('/admin/addCurso','Curso\CursoController@addCurso')->name('addCurso');
Route::get('/admin/CursoAdmin/{id}','Curso\CursoController@viewCursoAdmin')->name('viewCursoAdmin');
Route::get('/admin/cursosTables', 'Curso\CursoController@getCursosDatatables')->name('getCursosTables');
Route::delete('/admin/deleteCurso','Curso\CursoController@deleteCurso')->name('deleteCurso');
Route::get('/admin/editCurso/{id}', 'Curso\CursoController@editCursoView')->name('editCursoView');
Route::get('/admin/addModulosCurso/{id}', 'Curso\CursoController@addModulosCursoView')->name('addModulosCursoView');
Route::put('/admin/editCurso','Curso\CursoController@editCurso')->name('updateCurso');


//Modulos Routes
Route::post('/admin/addModulo','ModuloCurso\ModuloCursoController@addModulo')->name('addModulo');
Route::get('/admin/addModulo/{id}', 'ModuloCurso\ModuloCursoController@addModuloView')->name('addModuloView');
Route::get('/admin/getModulosView/{id}', 'ModuloCurso\ModuloCursoController@getModulosView')->name('getModulosView');
Route::get('/admin/getModulosTables/{id}', 'ModuloCurso\ModuloCursoController@getModulosTables')->name('getModulosTables');
Route::get('/admin/modulo/{id}', 'ModuloCurso\ModuloCursoController@getModuloView')->name('getModuloView');
Route::get('/admin/editmodulo/{id}', 'ModuloCurso\ModuloCursoController@editModuloView')->name('editModuloView');
Route::put('/admin/editModulo','ModuloCurso\ModuloCursoController@editModulo')->name('editModulo');
Route::delete('/admin/deleteModulo','ModuloCurso\ModuloCursoController@deleteModulo')->name('deleteModulo');


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

Route::get('/team', 'Docente\DocenteController@getTeamView')->name('getTeamView');

Route::get('/teamdocente/{id}', 'Docente\DocenteController@getTeamDocenteView')->name('getTeamDocenteView');

    



//post
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('AdminLogin');
//Route::post('/upload/docente', 'AdminController@uploadDocente')->name('uploadDocente');

Route::get('/librerias', function () {
    return View('libraries.libraries');
});















Auth::routes();


