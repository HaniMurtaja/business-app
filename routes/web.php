<?php


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {


    Route::get('/', 'WEB\Site\FrontController@index')->name('homePage');
    Route::get('/notFound', 'WEB\Site\FrontController@index')->name('notFound');


    Route::get('/shop', 'WEB\Site\FrontController@shop')->name('shop');
    Route::get('/events', 'WEB\Site\FrontController@events')->name('events');
    Route::get('/magazines', 'WEB\Site\FrontController@magazines')->name('magazines');
    Route::get('/galleries', 'WEB\Site\FrontController@galleries')->name('galleries');
    Route::get('/aboutUs', 'WEB\Site\FrontController@aboutUs')->name('aboutUs');
    Route::get('/contactUs', 'WEB\Site\FrontController@contactUs')->name('contactUs');
    
    Route::get('/eventDetails/{id}', 'WEB\Site\FrontController@eventDetails')->name('eventDetails');
    Route::get('/articleDetails/{id}', 'WEB\Site\FrontController@articleDetails')->name('articleDetails');
    
    
    
    
    Route::get('/coursesByTrainer/{id}', 'WEB\Site\FrontController@coursesByTrainer')->name('coursesByTrainer');
    Route::get('/coursesByCategory/{id}', 'WEB\Site\FrontController@coursesByCategory')->name('coursesByCategory');
    Route::get('/courseDetails/{id}', 'WEB\Site\FrontController@courseDetails')->name('courseDetails');
    Route::get('/onLineCourses', 'WEB\Site\FrontController@onLineCourses')->name('onLineCourses');
    Route::get('/ourWorks', 'WEB\Site\FrontController@ourWorks')->name('ourWorks');
    Route::get('/FAQ', 'WEB\Site\FrontController@FAQ')->name('FAQ');
    Route::get('/ourTeam', 'WEB\Site\FrontController@ourTeam')->name('ourTeam');
    Route::get('/joinToOurTeam', 'WEB\Site\FrontController@joinToOurTeam')->name('joinToOurTeam');
    Route::post('/storeTrainerRequest', 'WEB\Site\FrontController@storeTrainerRequest')->name('storeTrainerRequest');





    Route::get('/pageDetails/{id}', 'WEB\Site\FrontController@pageDetails')->name('pageDetails');
    Route::get('/faqs', 'WEB\Site\FrontController@faqs')->name('faqs');

    Route::get('/contactUs', 'WEB\Site\FrontController@contactUs')->name('contactUs');
    Route::post('/sendContactMsg', 'WEB\Site\FrontController@sendContactMsg')->name('sendContactMsg');


    Route::get('/blogs/', 'WEB\Site\FrontController@blogs')->name('blogs');
    Route::get('/blogDetails/{id}', 'WEB\Site\FrontController@blogDetails')->name('blogDetails');

    Route::get('/addToVisitorsEmails/{email}', 'WEB\Site\FrontController@addToVisitorsEmails')->name('addToVisitorsEmails');
    Route::get('/productsByCategory/{id}', 'WEB\Site\FrontController@productsByCategory')->name('productsByCategory');
    Route::get('/productsByBrands/{category_id}/{brand_id}', 'WEB\Site\FrontController@productsByBrands')->name('productsByBrands');
    Route::get('/allProductsByBrands/{brand_id}', 'WEB\Site\FrontController@allProductsByBrands')->name('allProductsByBrands');
    Route::get('/productsByTaget/{id}', 'WEB\Site\FrontController@productsByTaget')->name('productsByTaget');
    Route::get('/productDetails/{id}', 'WEB\Site\FrontController@productDetails')->name('productDetails');

    Route::get('/adsView/{id}', 'WEB\Site\FrontController@adsView')->name('adsView');


    Route::get('/productsNewArrivals', 'WEB\Site\FrontController@productsNewArrivals')->name('productsNewArrivals');
    Route::get('/productsBestSellers', 'WEB\Site\FrontController@productsBestSellers')->name('productsBestSellers');
    Route::get('/productsPopularNow', 'WEB\Site\FrontController@productsPopularNow')->name('productsPopularNow');


    Route::get('/login', 'WEB\Site\FrontController@login')->name('login');
    Route::post('/storeNewUser', 'WEB\Site\FrontController@storeNewUser')->name('storeNewUser');
    Route::post('/loginUsers', 'WEB\Site\FrontController@loginUsers')->name('loginUsers');
    Route::get('/ForgotPassword', 'WEB\Site\FrontController@ForgotPassword')->name('ForgotPassword');
    Route::post('/ResetPassword', 'WEB\Site\FrontController@ResetPassword')->name('ResetPassword');


    Route::get('/searchResults/', 'WEB\Site\FrontController@searchResults')->name('searchResults');


    Route::get('/myWishlist', 'WEB\Site\FrontController@myWishlist')->name('myWishlist');
    Route::get('/addToWishlist/{id}', 'WEB\Site\FrontController@addToWishlist')->name('addToWishlist');
    Route::get('/DeleteWishlistItem/{product_id}', 'WEB\Site\FrontController@DeleteWishlistItem')->name('DeleteWishlistItem');



    Route::post('/addToCart/', 'WEB\Site\FrontController@addToCart')->name('addToCart');
    Route::get('/viewMyCart/', 'WEB\Site\FrontController@viewMyCart')->name('viewMyCart');
    Route::get('/DeleteCartItem/{cart_id}', 'WEB\Site\FrontController@DeleteCartItem')->name('DeleteCartItem');
    Route::post('/updateCart/', 'WEB\Site\FrontController@updateCart')->name('updateCart');



    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return route('/login')->name('login_admin');
        });
        Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.form');
        Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
        Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    });




    Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'as' => 'admin.',], function () {
        Route::get('/', function () {
            return redirect('/admin/home');
        });
        Route::post('/changeStatus/{model}', 'WEB\Admin\HomeController@changeStatus');

        Route::get('home', 'WEB\Admin\HomeController@index')->name('admin.home');

        Route::get('/getCities/{id}','WEB\Admin\HomeController@getCities');
        Route::get('/getCountries/','WEB\Admin\HomeController@getCountries'); 
        
        

        Route::get('/admins/{id}/edit', 'WEB\Admin\AdminController@edit')->name('admins.edit');
        Route::patch('/admins/{id}', 'WEB\Admin\AdminController@update')->name('users.update');
        Route::get('/admins/{id}/edit_password', 'WEB\Admin\AdminController@edit_password')->name('admins.edit_password');
        Route::post('/admins/{id}/edit_password', 'WEB\Admin\AdminController@update_password')->name('admins.edit_password');
        


        if (can('admins')) {
            Route::get('/admins', 'WEB\Admin\AdminController@index')->name('admins.all');
            Route::post('/admins/changeStatus', 'WEB\Admin\AdminController@changeStatus')->name('admin_changeStatus');

            Route::delete('admins/{id}', 'WEB\Admin\AdminController@destroy')->name('admins.destroy');

            Route::post('/admins', 'WEB\Admin\AdminController@store')->name('admins.store');
            Route::get('/admins/create', 'WEB\Admin\AdminController@create')->name('admins.create');
        }


        
        
        if (can('users')) {
            Route::get('/users/{id}/edit_password', 'WEB\Admin\UserController@edit_password')->name('users.edit_password');
            Route::post('/users/{id}/edit_password', 'WEB\Admin\UserController@update_password')->name('users.edit_password');
            Route::resource('/users', 'WEB\Admin\UserController');
        }

        
        
        if (can('companies')) {
            Route::get('/companies/{id}/edit_password', 'WEB\Admin\CompanyController@edit_password')->name('companies.edit_password');
            Route::post('/companies/{id}/edit_password', 'WEB\Admin\CompanyController@update_password')->name('companies.edit_password');
            Route::resource('/companies', 'WEB\Admin\CompanyController');
        }

        
   
        // if (can('chat')) {
            Route::get('/chat', 'WEB\Admin\ChatController@chat_all_user');
            Route::get('/new_message/{id}/response', 'WEB\Admin\ChatController@new_message');
            Route::post('/new_message', 'WEB\Admin\ChatController@new_message_admin');
        // }
           
           
            Route::get('/staff_chat', 'WEB\Admin\ChatController@staff_chat_all_user');
            Route::get('/staff_chat_new_message/{id}/response', 'WEB\Admin\ChatController@staff_chat_new_message');
            Route::post('/staff_chat_new_message', 'WEB\Admin\ChatController@staff_chat_new_message_admin');
   
   
            Route::get('/department_new_message/', 'WEB\Admin\ChatController@department_new_message');
            Route::post('/department_new_message', 'WEB\Admin\ChatController@department_new_message_admin');
   
   
   
             
        if (can('employees')) {
            Route::get('/employees/{id}/edit_password', 'WEB\Admin\EmployeeController@edit_password')->name('employees.edit_password');
            Route::post('/employees/{id}/edit_password', 'WEB\Admin\EmployeeController@update_password')->name('employees.edit_password');
            Route::resource('/employees', 'WEB\Admin\EmployeeController');
        }
        
        
        
        if(can('payments_methods')){
            Route::resource('/payments_methods', 'WEB\Admin\PaymentMethodController');
        }   
        
        
        
        if(can('packages')){
            Route::resource('/packages', 'WEB\Admin\PackageController');
        }   
        
        
        if(can('packages_properties')){
            Route::resource('/packages_properties', 'WEB\Admin\PackagePropertyController');
        }   
        

        if (can('ads')) {
            Route::resource('/ads', 'WEB\Admin\AdController');
        }


        if (can('categories')) {
            Route::resource('/categories', 'WEB\Admin\CategoryController');
        }
        
        
        if (can('services')) {
            Route::resource('/services', 'WEB\Admin\ServiceController');
        }            
        
        
        if (can('coupons')) {
            Route::resource('/coupons', 'WEB\Admin\CouponController');
        }      
        
        
        if(can('orders')){
            Route::get('/orders/byStatus/{status}', 'WEB\Admin\OrderController@index')->name('orders.byStatus');
            Route::get('/orders/IssuanceOfInvoice/{id}', 'WEB\Admin\OrderController@IssuanceOfInvoice')->name('orders.IssuanceOfInvoice');
            Route::post('/orders/StoreIssuanceInvoice/{id}', 'WEB\Admin\OrderController@StoreIssuanceInvoice')->name('orders.StoreIssuanceInvoice');

            Route::get('/orders/editInvoice/{id}', 'WEB\Admin\OrderController@editInvoice')->name('orders.editInvoice');
            Route::post('/orders/updateInvoice/{id}', 'WEB\Admin\OrderController@updateInvoice')->name('orders.updateInvoice');

            Route::get('/orders/printInvoice/{id}', 'WEB\Admin\OrderController@printInvoice')->name('orders.printInvoice');

            Route::resource('/orders', 'WEB\Admin\OrderController');
        }
        
   

   
        if (can('settings')) {
            Route::get('settings', 'WEB\Admin\SettingController@index')->name('settings.all');
            Route::post('settings', 'WEB\Admin\SettingController@update')->name('settings.update');
        }


        if (can('contact_us')) {
            Route::get('/contact', 'WEB\Admin\ContactController@index')->name('contact.index');
            Route::get('/viewMessage/{id}', 'WEB\Admin\ContactController@viewMessage');
            Route::delete('/contact/{id}', 'WEB\Admin\ContactController@destroy');
            Route::post('/contact/addReplay', 'WEB\Admin\ContactController@addReplay')->name('contact.replay');
        }
 
 
        if(can('permissions'))
        {
            Route::resource('/role', 'WEB\Admin\RoleController');
        }
 
   

        if(can('pages'))
        {
            Route::resource('/pages', 'WEB\Admin\PagesController');
            Route::post('/pages/changeStatus', 'WEB\Admin\PagesController@changeStatus');
        }


      
        if (can('notifications')) {
            Route::get('/deleteByRandomKey/{random_key}', 'WEB\Admin\NotificationMessageController@deleteByRandomKey')->name('notifications.deleteByRandomKey');
            Route::resource('/notifications', 'WEB\Admin\NotificationMessageController');
        }

       
    });
    



});



