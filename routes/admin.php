
 <?php

use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix("admin")->group(function(){
   Route::get("/login", [LoginController::class, "showLoginForm"]);
   Route::get("/login", [LoginController::class, "login"]);
   Route::get("/logout", [LoginController::class, "logout"]);
});

 

 Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'as' => 'admin.',], function () {
    Route::get('/', function () {
        return redirect('/admin/home');
    });
    Route::post("/changeStatus", [HomeController::class, "changeStatus"]);

    Route::get("home", [HomeController::class, "index"]);

    Route::get("/getCities",[HomeController::class, "getCities"]);

    

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


     //   Route::get('/department_new_message/', 'WEB\Admin\ChatController@department_new_message');
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
