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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/companies', 'CompaniesController@index')->name('companies.index');
    Route::get('/companies/create', 'CompaniesController@create')->name('companies.create');
    Route::post('/companies', 'CompaniesController@store')->name('companies.store');
    Route::get('/companies/{company}', 'CompaniesController@show')->name('companies.show');
    Route::delete('/companies/{company}', 'CompaniesController@destroy')->name('companies.destroy');
    Route::put('/companies/{company}', 'CompaniesController@update')->name('companies.update');
    Route::get('/companies/{company}/more', 'CompaniesController@more')->name('companies.more');
    Route::get('/companies/{company}/edit', 'CompaniesController@edit')->name('companies.edit');

    Route::get('/projects', 'ProjectsController@index')->name('projects.index');
    Route::post('/projects', 'ProjectsController@store')->name('projects.store');
    Route::get('/projects/create/{company_id?}', 'ProjectsController@create')->name('projects.create');
    Route::delete('/projects/{project}', 'ProjectsController@destroy')->name('projects.destroy');
    Route::put('/projects/{project}', 'ProjectsController@update')->name('projects.update');
    Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');
    Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');

    Route::get('/roles', 'RolesController@index')->name('roles.index');
    Route::get('/roles/create', 'RolesController@create')->name('roles.create');
    Route::post('roles', 'RolesController@store')->name('roles.store');

    Route::get('/tasks', 'TasksController@index')->name('tasks.index');
    Route::get('/tasks/create/{project_id}', 'TasksController@create')->name('tasks.create');
    Route::post('/tasks', 'TasksController@store')->name('tasks.store');
    Route::get('/tasks/{task}', 'TasksController@show')->name('tasks.show');
    Route::delete('/tasks/{task}', 'TasksController@destroy')->name('tasks.destroy');
    Route::get('/tasks/{task}', 'TasksController@update')->name('tasks.update');
    Route::get('/tasks/{task}/edit', 'TasksController@edit')->name('tasks.edit');

    Route::get('/comments', 'CommentsController@index')->name('comments.index');
    Route::post('/comments', 'CommentsController@store')->name('comments.store');

    Route::get('/users', 'UsersController@index')->name('users');
});
