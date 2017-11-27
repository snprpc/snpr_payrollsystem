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

//Route::post('snprpc/payrollsystem/admin/login', 'AdminController@login')->name('login');
Route::resource('snprpc/payrollsystem/admin', 'AdminController');

Route::get('snprpc/payrollsystem/admin/{id}/addemployee', 'EmployeeController@addIndex')->name('add_employee');
Route::get('snprpc/payrollsystem/admin/{id}/storeemployee', 'EmployeeController@store')->name('store_employee');


Route::get('snprpc/payrollsystem/admin/{id}/adddepartment', 'DepartmentController@addIndex')->name('add_department');

Route::get('snprpc/payrollsystem/admin/{id}/storedepartment', 'DepartmentController@store')->name('store_department');

Route::resource('snprpc/payrollsystem/admin/{id}/wageinfo', 'WageController');
Route::get('snprpc/payrollsystem/admin/{id}/wageinfo/updatewage', 'WageController@show')->name('show_wage');
Route::get('snprpc/payrollsystem/admin/{id}/wageinfo/{wid}/updatewage', 'WageController@update')->name('update_wage');
Route::get('snprpc/payrollsystem/admin/{id}/search/wage', 'SearchController@wageIndex')->name('serch_wage');
Route::get('snprpc/payrollsystem/admin/{id}/search/wagebyname', 'SearchController@namewage')->name('name_serch_wage');
Route::get('snprpc/payrollsystem/admin/{id}/search/wagebypay', 'SearchController@paywage')->name('pay_serch_wage');
