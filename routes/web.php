
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
    
});



