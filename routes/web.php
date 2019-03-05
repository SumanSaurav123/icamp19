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

//Global routes
Route::get('/', 'adminController@showLandingPage');
Route::get('/member/login','memberController@getLoginPage');
Route::POST('/member/login','memberController@login');
//Routes for candidates
Route::get('/login',['as'=>'login','uses' => 'candidateController@getLoginPage']);
Route::get('/register','candidateController@getRegisterPage');
Route::POST('/login','candidateController@checkLogin');
Route::POST('/register','candidateController@checkRegister');
Route::get('/verify/{token}','candidateController@verifyAccount');
Route::get('/getForgetPasswordPage','candidateController@getForgetPasswordPage');
Route::POST('/forgetPassword','candidateController@forgetPassword');
Route::get('/resetPassword/{token}','candidateController@resetPasswordPage');
Route::POST('/resetPassword','candidateController@resetPassword');
Route::get('/check','candidateController@checkout');
//Routes for company



//Auth Routes
Route::group(['middleware'=>['auth']],function(){
    
    // Route::resource('admin','AdminController');
    //Route for candidates
    Route::get('/dashboard','candidateController@showDashboard');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::POST('/checkProfile','candidateController@updateProfile');
    Route::get('/company','candidateController@getCompanyPage');
    Route::get('/getAllCompany',['as'=>'showAllCompany','uses'=>'candidateController@getAllCompany']);
    Route::get('/getAllByCompanyTag',['as'=>'showAllByTagCompany','uses'=>'candidateController@getAllByCompany']);
    Route::get('/showResume',function(){
        
        return response()->download(storage_path('app/public/resumes/'.Auth::user()->resume));
    });
    Route::get('/companyAddToList/{id}','candidateController@addToList');
    Route::get('/getSelectedCompanyPage','candidateController@getSelectedCompanyPage');
    Route::get('/removeCompany/{id}','candidateController@removeCompany');
    Route::get('/payment','candidateController@getPaymentPage');
    Route::get('/checkout','candidateController@checkout');
    Route::get('/checkout/redirect','candidateController@redirect');
    Route::get('/check',function(){
        $data =  Auth::user()->companies_list;
        // foreach( $data as $d){
        //     return $d->companies;
        // }
        return $data;
    });    
});

//Routes for Member
Route::group(['middleware'=>['authcheck','web']],function(){
    Route::get('/member/dashboard','memberController@getMemberDashboard');
    Route::get('/member/logout','memberController@logout');
    Route::get('/member/idcard','memberController@getIdCardDistributionPage');
    Route::POST('/member/getDetails','memberController@getCandidateDetails');

});




