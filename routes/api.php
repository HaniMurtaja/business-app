<?php

use Illuminate\Http\Request;


    Route::get('settings', 'API\AppController@settings');  
        
    Route::post('/signUpUsers', 'API\UserController@signUpUsers');  
    Route::post('/checkCode', 'API\UserController@checkCode');  
    Route::post('/reSendCode', 'API\UserController@reSendCode');  
    Route::post('/forgotPassword','API\UserController@forgotPassword');     
    Route::post('/loginForUsers', 'API\UserController@loginForUsers'); 
    
    Route::get('/homeScreen', 'API\AppController@homeScreen'); 
    Route::get('/getServicesByCategory', 'API\AppController@getServicesByCategory');  
    Route::get('/getServicesByPoints', 'API\AppController@getServicesByPoints');  
    Route::get('/getServicesByUnfixedPrice', 'API\AppController@getServicesByUnfixedPrice');  
    Route::get('/getServicesDetails', 'API\AppController@getServicesDetails');  

    Route::get('pageDetails', 'API\AppController@pageDetails'); 
    Route::post('/sendContactMsg', 'API\AppController@sendContactMsg');

    Route::get('/getCategories', 'API\AppController@getCategories');  

    Route::get('/getPackages', 'API\AppController@getPackages');  
    Route::get('/getPackageDetails', 'API\AppController@getPackageDetails'); 
    
    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('/profile', 'API\UserController@profile');  
        Route::get('/logout', 'API\UserController@logout');  
        Route::post('/changePassword', 'API\UserController@changePassword'); 
        Route::post('/editProfile', 'API\UserController@editProfile'); 
        Route::get('/getMyNotifications', 'API\AppController@getMyNotifications');
        
        Route::post('/requestService', 'API\AppController@requestService'); 
        Route::post('/requestSpecialService', 'API\AppController@requestSpecialService'); 
        Route::post('/requestPackages', 'API\AppController@requestPackages'); 
        
        Route::get('/getMyProjects', 'API\AppController@getMyProjects');
        Route::get('/getMyProjectDetails', 'API\AppController@getMyProjectDetails');
        Route::get('/turnOffNotification', 'API\AppController@turnOffNotification');
        
        Route::get('/getMyPoints', 'API\AppController@getMyPoints');
        Route::get('/getMyContracts', 'API\AppController@getMyContracts');
        Route::get('/getMyPackages', 'API\AppController@getMyPackages');
        Route::get('/getMyInvoices', 'API\AppController@getMyInvoices');



        Route::get('/getChatMessage','API\ChatController@getChatMessage');
        Route::post('/sendMessage','API\ChatController@sendMessage');

    });



