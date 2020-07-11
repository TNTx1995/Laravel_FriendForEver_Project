<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>'Registration'],function(){
    Route::get('/','registerController@viewRegisterPage');
    Route::post('/register-insert','registerController@registerInfoInsert')->name('registerInsert');
});
Route::group(['prefix'=>'login'],function(){
    Route::view('/','login.logIn')->name('log');
    Route::post('/check-user','registerController@loggingControl')->name('checking-user');
});
Route::group(['prefix'=>'admin'],function(){
    Route::view('/admin-operation','admin.adminMain')->name('adminView');
});
Route::group(['prefix'=>'client'],function(){
    Route::post('/searchByEmail',"findFriends@searchSomeOne");
    Route::get('search-result/requestID/{rID}/searchID/{sID}','findFriends@friendRequest');
    Route::get('search-result/removeRequest/requestID/{rID}/searchID/{sID}','findFriends@cancelRequest');
    Route::get('view-friendRequestList',"friendOrRequestList_Show@viewAllFriendRequestList")->name('viewFrndReqLst');
   Route::get('view-allFriends',"friendOrRequestList_Show@viewFriendsList")->name('viewAllFriends');



    Route::get('add-friendToList/requestID/{rID}/handleID/{sID}','addFriendControllerAndFriendList@addFriend');
    Route::get('Delete-friendToList/requestID/{rID}/handleID/{sID}/deleteingReq','findFriends@cancelRequest');
});
