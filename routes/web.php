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
    Route::post('/changeUserStatus/{id}', 'UserController@changeUserStatus');

    Route::get('/achievementCreate', 'UserController@achievementCreate');
    Route::post('/achievementCreatePost', 'UserController@achievementCreatePost');
    Route::get('/achievementManagement', 'UserController@achievementManagement');
    Route::post('/achievementManagement', 'UserController@achievementManagementPost');

    Route::get('/projectType', 'ProjectController@projectType');
    Route::get('/projectCreate', 'ProjectController@projectCreate');
    Route::post('/projectCreatePost', 'ProjectController@projectCreatePost');
    Route::get('/projectManagement', 'ProjectController@projectManagement');
    Route::get('/projectDetails/{id}', 'ProjectController@projectDetails');
    Route::post('/updateProject', 'ProjectController@updateProject');
    Route::get('deleteProjectPicture/{id}', 'ProjectController@deleteProjectPicture');//use in updating project (project details blade)
    Route::post('deleteVideo/{id}', 'ProjectController@deleteVideo');//use in updating project (project details blade)


    Route::get('/addInternshipImage', 'InternshipController@addInternshipImage');
    Route::post('/addInternshipImagePost', 'InternshipController@addInternshipImagePost');
    Route::get('/internshipImageManagement', 'InternshipController@internshipImageManagement');
    Route::get('editInternship/{id}','InternshipController@editInternship');
    Route::post('editInternshipPicture', 'InternshipController@editInternshipPicture');//this route is related to edit sliders picture
    Route::post('editInternshipTitle', 'InternshipController@editInternshipTitle');//this route is related ti edit sliders title
    Route::post('enableOrDisableInternship', 'InternshipController@enableOrDisableInternship');//this route is related to make sliders enable or disable


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
