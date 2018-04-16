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
  ])->middleware('role');

Route::resource('roles','RoleController')->names([
  'index'=>'role-list',
  'show'=>'role-details',
  'create'=>'role-create',
  'store'=>'role-store',
  'edit'=>'role-edit',
  'update'=>'role-update',
  'destroy'=>'role-destroy'
])->middleware('role');

Route::resource('files','FileController')->names([
  'index'=>'file-list',
  'show'=>'file-details',
  'create'=>'file-create',
  'store'=>'file-store',
  'edit'=>'file-edit',
  'update'=>'file-update',
  'destroy'=>'file-destroy'
])->middleware('role');
