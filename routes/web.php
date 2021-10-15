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

use App\Http\Controllers\FrontController;

Route::get('/', 'FrontendController@index')->name('hmpg');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/contacts', 'FrontendController@contact')->name('contact');
Route::post('/contacts/store', 'FrontendController@store')->name('client.message');
Route::get('/news/details/{id}', 'FrontendController@detail')->name('news.detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'],function(){
    Route::prefix('/user')->group(function(){
        Route::get('/view','backend\UserController@userView')->name('user.view');
        Route::get('/add','backend\UserController@userAdd')->name('user.add');
        Route::post('/store','backend\UserController@userStore')->name('user.store');
        Route::get('/edit/{id}','backend\UserController@userEdit')->name('user.edit');
        Route::post('/update/{id}','backend\UserController@userUpdate')->name('user.update');
        Route::get('/delete/{id}','backend\UserController@userDelete')->name('user.delete');
    });
    Route::prefix('/profiles')->group(function(){
        Route::get('/view','backend\ProfileController@profilesView')->name('profiles.view');
        Route::get('/edit','backend\ProfileController@profilesEdit')->name('profiles.edit');
        Route::post('/update','backend\ProfileController@profilesUpdate')->name('profiles.update');
        Route::get('/password','backend\ProfileController@password')->name('password.change');
        Route::post('/password/reset','backend\ProfileController@passwordReset')->name('password.reset');
    });
    Route::prefix('/logos')->group(function(){
        Route::get('/view','backend\LogoController@view')->name('logo.view');
        Route::get('/add','backend\LogoController@add')->name('logo.add');
        Route::post('/store','backend\LogoController@store')->name('logo.store');
        Route::get('/edit/{id}','backend\LogoController@edit')->name('logo.edit');
        Route::post('/update/{id}','backend\LogoController@update')->name('logo.update');
        Route::get('/delete/{id}','backend\LogoController@delete')->name('logo.delete');
    });
    Route::prefix('/slider')->group(function(){
        Route::get('/view','backend\SliderController@view')->name('slider.view');
        Route::get('/add','backend\SliderController@add')->name('slider.add');
        Route::post('/store','backend\SliderController@store')->name('slider.store');
        Route::get('/edit/{id}','backend\SliderController@edit')->name('slider.edit');
        Route::post('/update/{id}','backend\SliderController@update')->name('slider.update');
        Route::get('/delete/{id}','backend\SliderController@delete')->name('slider.delete');
    });
    Route::prefix('/mission')->group(function(){
        Route::get('/view','backend\MissionController@view')->name('mission.view');
        Route::get('/add','backend\MissionController@add')->name('mission.add');
        Route::post('/store','backend\MissionController@store')->name('mission.store');
        Route::get('/edit/{id}','backend\MissionController@edit')->name('mission.edit');
        Route::post('/update/{id}','backend\MissionController@update')->name('mission.update');
        Route::get('/delete/{id}','backend\MissionController@delete')->name('mission.delete');
    });
    Route::prefix('/vision')->group(function(){
        Route::get('/view','backend\VisionController@view')->name('vision.view');
        Route::get('/add','backend\VisionController@add')->name('vision.add');
        Route::post('/store','backend\VisionController@store')->name('vision.store');
        Route::get('/edit/{id}','backend\VisionController@edit')->name('vision.edit');
        Route::post('/update/{id}','backend\VisionController@update')->name('vision.update');
        Route::get('/delete/{id}','backend\VisionController@delete')->name('vision.delete');
    });
    Route::prefix('/news_&_event')->group(function(){
        Route::get('/view','backend\NewsController@view')->name('news.view');
        Route::get('/add','backend\NewsController@add')->name('news.add');
        Route::post('/store','backend\NewsController@store')->name('news.store');
        Route::get('/edit/{id}','backend\NewsController@edit')->name('news.edit');
        Route::post('/update/{id}','backend\NewsController@update')->name('news.update');
        Route::get('/delete/{id}','backend\NewsController@delete')->name('news.delete');
    });
    Route::prefix('/services')->group(function(){
        Route::get('/view','backend\ServiceController@view')->name('services.view');
        Route::get('/add','backend\ServiceController@add')->name('services.add');
        Route::post('/store','backend\ServiceController@store')->name('services.store');
        Route::get('/edit/{id}','backend\ServiceController@edit')->name('services.edit');
        Route::post('/update/{id}','backend\ServiceController@update')->name('services.update');
        Route::get('/delete/{id}','backend\ServiceController@delete')->name('services.delete');
    });
    Route::prefix('/contact')->group(function(){
        Route::get('/view','backend\ContactController@view')->name('contact.view');
        Route::get('/add','backend\ContactController@add')->name('contact.add');
        Route::post('/store','backend\ContactController@store')->name('contact.store');
        Route::get('/edit/{id}','backend\ContactController@edit')->name('contact.edit');
        Route::post('/update/{id}','backend\ContactController@update')->name('contact.update');
        Route::get('/delete/{id}','backend\ContactController@delete')->name('contact.delete');
        Route::get('/communicate','backend\ContactController@communicate')->name('contact.communicate');
        Route::get('/communicate/delete/{id}','backend\ContactController@commdelete')->name('communicate.delete');
    });
    Route::prefix('/about')->group(function(){
        Route::get('/view','backend\AboutController@view')->name('about.view');
        Route::get('/add','backend\AboutController@add')->name('about.add');
        Route::post('/store','backend\AboutController@store')->name('about.store');
        Route::get('/edit/{id}','backend\AboutController@edit')->name('about.edit');
        Route::post('/update/{id}','backend\AboutController@update')->name('about.update');
        Route::get('/delete/{id}','backend\AboutController@delete')->name('about.delete');
    });

    Route::prefix('/result')->group(function(){
        Route::get('/view','backend\ResultController@view')->name('result.view');
        Route::post('/view','backend\ResultController@queriess')->name('result.queriess');
        Route::get('/add','backend\ResultController@add')->name('result.add');
        Route::get('/make','backend\ResultController@make')->name('result.make');
        Route::post('/make','backend\ResultController@queries')->name('result.queries');
        Route::post('/store','backend\ResultController@store')->name('result.store');
        Route::get('/edit/{id}','backend\ResultController@edit')->name('result.edit');
        Route::post('/update/{id}','backend\ResultController@update')->name('result.update');
        Route::get('/delete/{id}','backend\ResultController@delete')->name('result.delete');
    });
    Route::prefix('/course')->group(function(){
        Route::get('/view','backend\CourseController@view')->name('course.view');
        Route::get('/add','backend\CourseController@add')->name('course.add');
        Route::post('/store','backend\CourseController@store')->name('course.store');
        Route::get('/edit/{id}','backend\CourseController@edit')->name('course.edit');
        Route::post('/update/{id}','backend\CourseController@update')->name('course.update');
        Route::get('/delete/{id}','backend\CourseController@delete')->name('course.delete');
    });

    Route::prefix('/notice')->group(function(){
        Route::get('/view','backend\NoticeController@view')->name('notice.view');
        Route::get('/add','backend\NoticeController@add')->name('notice.add');
        Route::post('/store','backend\NoticeController@store')->name('notice.store');
        Route::get('/edit/{id}','backend\NoticeController@edit')->name('notice.edit');
        Route::post('/update/{id}','backend\NoticeController@update')->name('notice.update');
        Route::get('/delete/{id}','backend\NoticeController@delete')->name('notice.delete');
    });
    Route::prefix('/attendance')->group(function(){
        Route::get('/view','backend\AttendanceController@view')->name('attendance.view');
        Route::get('/view/{date}/{year}/{semester}','backend\AttendanceController@viewbydate')->name('attendance.viewbydate');
        Route::post('/view','backend\AttendanceController@queriess')->name('attendance.queriess');
        Route::get('/take','backend\AttendanceController@take')->name('attendance.take');
        Route::post('/take','backend\AttendanceController@queries')->name('attendance.queries');
        Route::get('/add','backend\AttendanceController@add')->name('attendance.add');
        Route::post('/store','backend\AttendanceController@store')->name('attendance.store');
        Route::get('/edit/{date}/{year}/{semester}','backend\AttendanceController@edit')->name('attendance.edit');
        Route::post('/update','backend\AttendanceController@update')->name('attendance.update');
    });
});
