<?php
Route::prefix('api/app/')->group(function () {
    Route::get('/install/pre-requisite', 'Salox\Service\Controllers\InstallController@preRequisite');
    Route::post('/install/validate/{option}', 'Salox\Service\Controllers\InstallController@store');
    Route::post('/install', 'Salox\Service\Controllers\InstallController@store');
    Route::post('/license', 'Salox\Service\Controllers\LicenseController@verify');

    Route::post('/biometric', 'Salox\Service\Controllers\AttendanceController@read');
    Route::post('/biometric/v2', 'Salox\Service\Controllers\AttendanceController@readV2');

    Route::get('/about', 'Salox\Service\Controllers\HomeController@about');
    Route::get('/support', 'Salox\Service\Controllers\SupportController@index');
    Route::post('/support', 'Salox\Service\Controllers\SupportController@submit');
    Route::get('/update', 'Salox\Service\Controllers\UpdateController@index');
    Route::post('/download', 'Salox\Service\Controllers\UpdateController@download');
    Route::post('/update', 'Salox\Service\Controllers\UpdateController@update');
    Route::post('/help/content', 'Salox\Service\Controllers\HomeController@helpDoc');

    Route::get('/license/validate', 'Salox\Service\Controllers\HomeController@licenseValidate');
});
