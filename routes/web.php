<?php
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/role','HomeController@useroles')->name('user.roles');

//=== Appcontroller routes part ===




Route::group(['roles'=>['Admin']],function(){
    Route::get('/admin',[
        'uses' => 'AppController@admin',
        'as'   => 'adminaccess',
    ]);
    Route::get('/user/{id}/profile',[
        'uses' => 'AppController@userprofile',
        'as'   =>'user.profile',
       
    ]);
    
    Route::post('/assign',[
        'uses' => 'AppController@assignrole',
        'as' => 'assign.role',
    ]);

});

Route::group(['roles'=>'User'],function(){
    Route::get('/user',[
        'uses' => 'AppController@user',
        'as'   => 'useraccess',
       
    ]);
});
Route::group(['roles'=>'Author'],function(){
    Route::get('/author',[
        'uses' => 'AppController@author',
        'as'   => 'authoraccess',
        'roles'=> ['Author'], 
    ]);

});

