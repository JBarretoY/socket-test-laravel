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

Route::get('noti-test','NotificationController@testNoti');

Route::get('test','UserController@test');

Route::prefix('auth')->group(function(){
    Route::post('login','AuthController@login');
    Route::get('logout','AuthController@logout');
});

Route::get('/', 'WebController@indexLanding');

Route::get('login',function(){
    return view('login');
})->name('login');

Route::get('/search', 'WebController@search');

Route::get('register',function(){
    return view('register');
})->name('register');

Route::get('register/{rol}', 'WebController@pageRegister');
Route::get('edit-profile', 'UserController@getDataUserAuth')->middleware('auth');

###TEST-PAYPAL###
Route::get('repay',function(){
    return view('formpay');
})->middleware('auth');
// route for processing payment
Route::post('paypal', 'PaypalController@payWithpaypal')->middleware('auth');
// route for check status of the payment
Route::get('status', 'PaypalController@getPaymentStatus')->middleware('auth');
###PAYWITHPAYPAL
//Route::get('atp','EscrowPaypalController@getTokenBearer')->middleware('auth');
Route::post('pay','EscrowPaypalController@sendPay')->middleware('auth');
###ENDPAY###

Route::get('/messages', 'WebController@inbox');

Route::get('create-project', 'WebController@createProject');
Route::get('my-projects', 'WebController@projects');
Route::get('projects/{slug}', 'WebController@projectPreview');
Route::get('my-credit', 'WebController@myCredit');

Route::prefix('user')->middleware('auth')->group(function(){
    Route::post('store','UserController@store');
    Route::put('update','UserController@update');
    Route::get('show/{id}','UserController@show');
    Route::get('index','UserController@index');
    Route::patch('update-email','UserController@updateMail');
    Route::get('check-user/{email}','UserController@checkUserExist');
    Route::patch('change-status/{status}','UserController@changStatus');
    Route::patch('updatepass','UserController@updatePass');
    Route::post('set-avatar','UserController@setAvatar');
    Route::get('confirm-account/{token}','UserController@confirmUser');
    Route::post('set-ranking','RankingController@setRankingUser');
});

Route::prefix('company')->middleware('auth')->group(function(){
    Route::put('update','CompanyController@update');
    Route::get('show/{id}','CompanyController@show');
});

Route::prefix('certificate')->middleware('auth')->group(function(){
    Route::post('store','CertificateController@store');
    Route::put('update','CertificateController@update');
    Route::get('show/{id}','CertificateController@show');
    Route::get('index','CertificateController@index');
    Route::delete('destroy/{id}','CertificateController@destroy');
});

Route::prefix('education')->middleware('auth')->group(function(){
    Route::post('store','EducationController@store');
    Route::put('update','EducationController@update');
    Route::get('show/{id}','EducationController@show');
    Route::get('index','EducationController@index');
    Route::delete('destroy/{id}','EducationController@destroy');
});

Route::prefix('portfolio')->middleware('auth')->group(function(){
    Route::post('store','PortfolioController@store');
    Route::put('update','PortfolioController@update');
    Route::patch('update-files','PortfolioController@updateFiles');
    Route::get('show/{id}','PortfolioController@show');
    Route::get('index','PortfolioController@index');
    Route::delete('destroy/{id}','PortfolioController@destroy');
    Route::post('add-files','PortfolioController@addFile');
    Route::post('del-files','PortfolioController@deleteFile');
});

Route::prefix('work-experience')->middleware('auth')->group(function(){
    Route::post('store','WorkExperienceController@store');
    Route::put('update','WorkExperienceController@update');
    Route::get('show/{id}','WorkExperienceController@show');
    Route::get('index','WorkExperienceController@index');
    Route::delete('destroy/{id}','WorkExperienceController@destroy');
});

Route::prefix('bid')->middleware('auth')->group(function(){
    Route::post('store','BidController@store');
    Route::patch('response','BidController@responseOffer');
});

Route::prefix('task')->middleware('auth')->group(function(){
    Route::patch('add-price','TaskController@addPrice');
    Route::patch('change-status','TaskController@changeStatus');
});

Route::prefix('notification')->middleware('auth')->group(function(){
    Route::patch('read','NotificationController@markRead');
    Route::post('make-notifi','NotificationController@');
});

Route::prefix('message')->middleware('auth')->group(function(){
    Route::post('store','MessageController@store');
    Route::patch('read','MessageController@markRead');
    Route::get('work-space/{project_id}','MessageController@indexWorkspace');
});

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('general-data','AdminController@adminData');
    Route::get('users-categ/{subcategory_id}','AdminController@subcategoUser');
});

Route::prefix('dispute')->middleware('auth')->group(function(){
    Route::post('store','DisputeController@store');
    Route::get('show','DisputeController@show');
    Route::get('index-user/{$user_id}','DisputeController@indexByUser');
    Route::get('index-status/{$status}','DisputeController@indexByStatus');
    Route::patch('result','DisputeController@result');
});

Route::prefix('projects')->group(function(){
    Route::get('/','ProjectController@index');
    Route::get('/{slug}/workspace', 'ProjectController@workspace');
    Route::post('store','ProjectController@store');
    Route::patch('close','ProjectController@closeProject');
    Route::get('/get/index-by-user','ProjectController@indexByUser');
    Route::get('show/{project_id}','ProjectController@show');
    Route::patch('publish/{project_id}','ProjectController@publishDraft');
});

Route::prefix('consultants')->group(function () {
    Route::get('/', 'ConsultantsController@index');
    Route::get('/{username}', 'ConsultantsController@show');
});

Route::prefix('package')->middleware('auth')->group(function(){
    Route::post('store','PackageController@store');
    Route::get('show/{id}','PackageController@show');
    Route::get('index','PackageController@index');
});

Route::prefix('ranking')->middleware('auth')->group(function(){
    Route::post('set-ranking','RankingController@setRanking');
});

Route::prefix('searcher')->group(function(){
    Route::get('consultants','WebController@searchConsultant');
    Route::get('deep-consultants','WebController@searchDeepConsultant');
    Route::get('projects','WebController@searchProject');
    Route::get('deep-proyects','WebController@searchDeepProject');
});
