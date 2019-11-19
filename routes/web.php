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
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/fetch_data', 'HomeController@fetch_data');

Route::get('/get-started', 'HomeController@getStarted')->name('home.get-started');

Route::get('/faq', 'HomeController@faq')->name('home.faq');

Route::get('/contact', 'HomeController@contact')->name('home.contact');


Route::resource('/guide', 'GuideController');

Route::get('/guide/{guide}/preview', 'GuideController@preview')->name('guide.preview')->middleware('auth');

Route::post('/guide/{guide}/enroll', 'GuideController@enroll')->name('guide.enroll');

Route::post('/guide/{guide}/like', 'LikeController@likeGuide')->name('guide.like');

Route::post('/guide/{guide}/dislike', 'LikeController@disLikeGuide')->name('guide.dislike');

Route::get('/member/dashboard', 'MemberController@dashboard')->name('member.dashboard');

Route::get('/member/dashboard-tabular', 'MemberController@dashboardTabular')->name('member.dashboard-tabular');

Route::get('/notifications', 'NotificationController@index')->name('notifications.index');