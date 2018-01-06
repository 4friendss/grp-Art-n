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
Route::get('/', 'HomeController@home');
Route::post('/registerInternship', 'InternshipController@registerInternship');
Route::get('/loadProjects', 'ProjectController@loadProjects');
Route::get('/projectDetail/{id}', 'ProjectController@projectDetail');
Route::get('/w2', function () {
    return view('admin.workerCardCreate.blade');
});
//,'middleware'=>'auth'
Route::group(['prefix' => 'admin/'], function () {
    Route::get('/workerCardCreate', function () {
        return view('admin.workerCardCreate.blade');
    });
    Route::get('/usersCreate', 'UserController@usersCreate');
    Route::post('/usersCreate', 'UserController@usersCreatePost');
    Route::get('/usersManagement', 'UserController@usersManagement');
    Route::post('/usersManagement', 'UserController@usersManagementPost');

    Route::get('/newsCreate', 'UserController@newsCreate');
    Route::post('/newsCreate', 'UserController@newsCreatePost');
    Route::get('/newsManagement', 'UserController@newsManagement');
    Route::post('/newsManagement', 'UserController@newsManagementPost');

    Route::get('/projectType', 'ProjectController@projectType');
    Route::get('/projectCreate', 'ProjectController@projectCreate');
    Route::post('/projectCreatePost', 'ProjectController@projectCreatePost');
    Route::get('/projectManagement', 'ProjectController@projectManagement');
    Route::post('/projectManagement', 'ProjectController@projectManagementPost');

    Route::get('/categoryProjectCreate', 'UserController@categoryProjectCreate');
    Route::post('/categoryProjectCreate', 'UserController@categoryProjectCreatePost');
    Route::get('/categoryProjectManagement', 'UserController@categoryProjectManagement');
    Route::post('/categoryProjectManagement', 'UserController@categoryProjectManagementPost');

    Route::get('/internshipCreate', 'UserController@internshipCreate');
    Route::post('/internshipCreate', 'InternshipController@internshipCreatePost');
    Route::get('/internshipManagement', 'UserController@internshipManagement');
    Route::post('/internshipManagement', 'InternshipController@internshipManagementPost');
    Route::get('/internshipFormsManagement', 'UserController@internshipFormsManagement');
    Route::post('/internshipFormsManagement', 'InternshipController@internshipFormsManagementPost');
});

Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm');
//Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
//
//// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm');
//Route::post('register', 'Auth\RegisterController@register');
Route::get('/home', 'HomeController@index')->name('home');
