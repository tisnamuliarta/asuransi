<?php

// send email
Route::get('/sendmail', 'TestSendMail@sendMail');

Route::get('testtree', function () {

    $in = App\User::select('id')
        ->where('parent_id','2');
    $first = App\User::select('name')
        ->whereIn('parent_id',$in);
    $second = App\User::select('name')
        ->where('parent_id','=','2')
        ->union($first)
        ->get();
//    $user = App\User::with('children')->where('id',2)->count();
    return response()->json($second);
});

Route::get('/', 'HomeController@index');

// member auth
Route::group(['middleware' => 'auth'], function() {
	Route::get('d/{id}','Member\MemberController@show')->name('user.downline');
	Route::get('setoran/{id}','Member\SetoranController@index')->name('user.setoranindex');
	Route::get('setoran/confirm/{id}', 'Member\SetoranController@displayConfirmForm')->name('user.confirmSetoran');
    Route::post('setoran/confirm/{id}', 'Member\SetoranController@postConfirmForm')->name('user.postConfirmSetoran');
    Route::get('tambah-downline/{id}','Member\MemberController@getAddDownlineForm');
    Route::post('tambah-downline/{id}','Member\MemberController@postAddDownline')->name('user.postAddDownline');
    Route::get('list-downline/{id}', 'Member\MemberController@addDownline')->name('add.downline');
    Route::get('bonus/{id}','Member\BonusController@displayBonuses')->name('user.displayBonus');
    Route::get('order-messages/{id}', 'Member\MemberController@getOrderPinForm')->name('get-order-messages');
    Route::post('order-messages/{id}', 'Member\MemberController@postOrderPinForm')->name('post-order-messages');

});

Route::get('upline', function() {
    $query = App\Bonus::select('user_id',DB::raw('bonus_referensi'), DB::raw('bonus_berbagi'))
            ->where('user_id','=',1)
            ->get();

    return $query;
});

// datatable
Route::get('setoran-member', 'Helper\DisplayDatatableController@getSetoran');
Route::get('display-bonus','Helper\DisplayDatatableController@getBonus');


// member downline
Route::get('tree-user/{id}','Member\MemberController@tree')->name('tree-user');
Route::get('downline-user/{id}', 'Helper\DisplayDatatableController@getMemberDownline')->name('user.listDownline');

/*
 * Auth
 */
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('postLogin');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name(' password.email');
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

/*
 * Admin Auth
 */
Route::get('tree',function() {
//	$user = App\User::with('children')->where('id',1)->get();
    $arrayBonus = [
        '9000','8000','7000','6000','5000','4500','4000','3500','3000','2750','2500','2000','1750','1250','750'
    ];

    for ($i=0; $i < count($arrayBonus); $i++) {
        echo $arrayBonus[$i] .'<br>';
    }
//	return response()->json($user);
	// $has = Crypt::encryptstring(1);
	// echo $has;
	
});

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.showLogin');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login');

/**
 * Auto Completes
 */
Route::prefix('autocomplete')->group(function () {
    Route::get('banks','Helper\AutoCompleteController@getBanks')->name('selectbanks');
    Route::get('sponsor','Helper\AutoCompleteController@getSponsorName')->name('selectsponsor');
    Route::get('upline','Helper\AutoCompleteController@getUplineName')->name('selectupline');
    Route::get('member-name', 'Helper\AutoCompleteController@getMemberName')->name('selectMemberName');

});

/*
 * Admin Route
 */
Route::prefix('admin')->group(function(){
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');

    // add member
    Route::get('add-member', 'Admin\ManageMemberController@index')->name('admin.add-member');
    Route::post('add-member', 'Admin\ManageMemberController@postAddMember')->name('addmember');
    Route::get('member','Admin\ManageMemberController@getMember')->name('displaymember');

    //setoran
    Route::get('setoran-member', 'Admin\SetoranMemberController@index')->name('setoran.member');
    Route::get('data-member', 'Helper\DisplayDatatableController@getMemberData')->name('data-member');
    Route::get('data-setoran', 'Helper\DisplayDatatableController@adminGetSetoran')->name('data-member');
    Route::post('comfirm-setoran/{id}', 'Admin\SetoranMemberController@postConfirm')->name('confirm-setoran');

    // Order Pin
    Route::get('order-pin', 'Admin\OrderPinController@index')->name('order-pin');
    Route::post('order-pin', 'Admin\OrderPinController@orderPin')->name('post-order-pin');
    Route::get('list-order-pin', 'Admin\OrderPinController@listOrderPin')->name('list-order-pin');
    Route::get('get-list-order', 'Helper\DisplayDatatableController@getListOrder');

    // order
    Route::post('confirm-order/{id}','Admin\OrderPinController@confirmOrder')->name('confirm-order');

    // report
    Route::get('laporan-member', 'Admin\ManageLaporanController@member')->name('laporan-member');
    Route::get('laporan-order', 'Admin\ManageLaporanController@order')->name('laporan-order');
    Route::get('laporan-setoran', 'Admin\ManageLaporanController@setoran')->name('laporan-setoran');
});
