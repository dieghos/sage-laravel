<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController')->except(['create', 'store'])->names([
   'index' => 'user-list',
   'show' => 'user-details',
   'edit' => 'user-edit',
   'update' => 'user-update',
   'destroy' => 'user-destroy'
  ])->middleware('permission:Administrar usuarios');

Route::resource('roles','RoleController')->names([
  'index'=>'role-list',
  'show'=>'role-details',
  'create'=>'role-create',
  'store'=>'role-store',
  'edit'=>'role-edit',
  'update'=>'role-update',
  'destroy'=>'role-destroy'
])->middleware('permission:Administrar roles');

Route::resource('files','FileController')->names([
  'index'=>'file-list',
  'show'=>'file-details',
  'create'=>'file-create',
  'store'=>'file-store',
  'edit'=>'file-edit',
  'update'=>'file-update',
  'destroy'=>'file-destroy'
])->middleware('permission:Administrar expedientes');

Route::get('file-term', 'TermController@index')->name('file-term-list')->middleware('permission:Administrar expedientes');

Route::get('status','FileController@status')->name('file-status')->middleware('permission:Administrar expedientes');

Route::delete('/documents/{document}', function(App\Document $document){
  $document->delete();
})->name('docs-destroy')->middleware('permission:Administrar expedientes');

Route::resource('jobs', 'JobsController')->except('show','edit','update','destroy')->names([
   'index' => 'jobs-list',
   'create' => 'jobs-create',
   'store' => 'jobs-store',
  ])->middleware('permission:Asignar trabajos');
