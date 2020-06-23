<?php

use App\User;
use Illuminate\Http\Request;

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


Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();
Route::resource('/role', 'RoleController');
Route::resource('/permission', 'PermissionController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/page_expire', 'UsersController@page_expire');

Route::resource('/users', 'UsersController');
Route::resource('/role', 'RoleController');
Route::resource('/permission', 'PermissionController');
Route::get('/role-permission', 'RolePermissionController@index');
Route::post('/role-permission-store', 'RolePermissionController@store');
// Route::get('role-permission-flter/{role_id}','PermissionController@role_permission');

Route::group(['middleware' => 'App\Http\Middleware\RolePermissionMiddleware'], function () {

    // ============Company Routes begins

    Route::get('/profile', 'UsersController@profile')->defaults('identity', 'User Profile,r');
    Route::post('/profile_update','UsersController@profile_Saved')->defaults('identity', 'User Profile,r');
    Route::get('companyDetails', 'CompanyController@companyDetails')->defaults('identity', 'Company,r');
    Route::get('add_company', 'CompanyController@addCompany')->name('add/company')->defaults('identity', 'Company,c');
    Route::post('store_company/{company_id}', 'CompanyController@storeCompany')->defaults('identity', 'Company,c');
    Route::post('store_company_deal/{company_id}', 'CompanyController@storeCompanyDeal')->defaults('identity', 'Company,c');
    Route::post('store_company_documents/{company_id}', 'CompanyController@storeCompanyDocs')->defaults('identity', 'Company,c');

    Route::get('/delete_member_list/{id}', 'CompanyController@delete_member_list')->defaults('identity', 'Company,d');
    Route::get('/edit_member_list/{id}', 'CompanyController@edit_member_list')->defaults('identity', 'Company,u');
    Route::post('/member_edit/{id}', 'CompanyController@editMemberDetails')->defaults('identity', 'Company,u');
    Route::get('/member_show/{id}/{check?}', 'CompanyController@viewCompanyDetails')->defaults('identity', 'Company,v');
    Route::get('/memberDetailsExport', 'CompanyController@memberDetailsExport')->defaults('identity', 'Company,r');
    Route::post('/upload_member_documents', 'CompanyController@uploadMemberDocs')->defaults('identity', 'Company,c');

    Route::get('/download_member_documents', 'CompanyController@downloadMemberDocs')->defaults('identity', 'Company,r');
    Route::get('/downloadMemberDocsTAN', 'CompanyController@downloadMemberDocsTAN')->defaults('identity', 'Company,r');
    Route::get('/downloadMemberDocsAOA', 'CompanyController@downloadMemberDocsAOA')->defaults('identity', 'Company,r');
    Route::get('/downloadMemberDocsMOA', 'CompanyController@downloadMemberDocsMOA')->defaults('identity', 'Company,r');
    Route::get('/downloadMemberDocsGST', 'CompanyController@downloadMemberDocsGST')->defaults('identity', 'Company,r');

    Route::get('/memberDocs', 'CompanyController@memberDocs')->defaults('identity', 'Company,r');
    Route::get('/getListDocument', 'CompanyController@getListDocument')->defaults('identity', 'Company,r');
    Route::post('/submitCompany', 'AdminController@submitCompany')->defaults('identity', 'Company,c');
    
    // ============Company Routes ends


    // Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin', 'AdminController@fonikIndex')->name('admin')->defaults('identity', 'Dashboard,r');
    // Route::get('/admin', 'AdminController@toggleCompany');


    Route::get('editEmployee/{employee_id}', 'EmployeeController@editEmployee')->defaults('identity', 'Member,u');
    Route::post('editEmployeeSave/{employee_id}', 'EmployeeController@editEmployeeSave')->defaults('identity', 'Member,u');
    Route::get('employeeDetails/{employees_id}', 'EmployeeController@employeeDetails')->defaults('identity', 'Member,v');
    Route::get('deleteEmployee/{employees_id}', 'EmployeeController@deleteEmployee')->defaults('identity', 'Member,d');

    Route::get('/employee_list/{member_id}', 'CompanyController@employeelist')->defaults('identity', 'Member,r');
    
    //New Employee details Route
    Route::get('/fonik_employee_list/{member_id}', 'CompanyController@fonikemployeelist')->defaults('identity', 'Member,r');

    Route::get('/createEmployee/{member_id}', 'EmployeeController@createEmployee')->defaults('identity', 'Member,c');
    Route::get('/employeList', 'CompanyController@employeList')->defaults('identity', 'Member,r');
    Route::post('/employeeDetailSubmit/{member_id}', 'EmployeeController@employeeDetailSubmit')->defaults('identity', 'Member,c');
    Route::get('/employeExport', 'EmployeeController@employeExport')->defaults('identity', 'Member,r');
    Route::get('/addMembers', 'EmployeeController@addMembers')->defaults('identity', 'Member,c');
    Route::post('/employeSave', 'EmployeeController@employeSave')->defaults('identity', 'Member,c');
    Route::get('/change_employee_status/{employee_status}/{employee_id}/{button_class}', 'EmployeeController@changeEmployeeStatus')->defaults('identity', 'Member,u');


    Route::post('/Company_filter', 'CompanyController@Company_filter')->defaults('identity', 'Company,r');

    Route::get('/activeCompany', 'CompanyController@activeCompany')->defaults('identity', 'Company,r');
    Route::get('/InactiveCompany', 'CompanyController@InactiveCompany')->defaults('identity', 'Company,r');
    Route::get('/activeEmployee', 'EmployeeController@activeEmployee')->defaults('identity', 'Member,r');
    Route::get('/InactiveEmployee', 'EmployeeController@InactiveEmployee')->defaults('identity', 'Member,r');



    Route::get('/occupancy', 'OccupancyController@occupancy')->defaults('identity', 'Occupancy,r');
    Route::get('/show_occupancy', 'OccupancyController@showOccupancy')->defaults('identity', 'Occupancy,r');
    Route::get('/add_occupancy', 'OccupancyController@add_occupancy')->defaults('identity', 'Occupancy,c');
    Route::post('/Employee_filter', 'CompanyController@Employee_filter')->defaults('identity', 'Member,r');


    Route::get('/agreement', 'AgreementController@index')->defaults('identity', 'Company,r');
    Route::get('changeMemberStatus', 'EmployeeController@changeMemberStatus')->defaults('identity', 'Member,u');

    Route::get('/downloadAddressProof/{id}', 'EmployeeController@downloadAddressProof')->name('downloadFIle')->defaults('identity', 'Member,r');

    Route::get('/downloadIdProof/{id}', 'EmployeeController@downloadIdProof')->name('downloadFIleId')->defaults('identity', 'Member,r');

    Route::get('/revenue', 'RevenueController@revenue')->name('revenue_data')->defaults('identity', 'Revenue,r');
    
    Route::get('/additionalRevenue', 'RevenueController@additionalRevenue')->name('additional_revenue')->defaults('identity', 'Additional Revenue,r');
    Route::get('/expense', 'RevenueController@expense')->name('expense_data')->defaults('identity', 'Expense,r');
    Route::get('/add_revenue', 'RevenueController@add_revenue')->defaults('identity', 'Revenue,c');
    Route::post('/additionalRevenueSave', 'RevenueController@additionalRevenueSave')->defaults('identity', 'Revenue,c');

    Route::post('/RevenueSave', 'RevenueController@RevenueSave')->defaults('identity', 'Revenue,c');
    Route::get('/edit_additional_revenue/{revenue_id}', 'RevenueController@edit_additional_revenue')->defaults('identity', 'Revenue,u');
    Route::post('/edit_revenue_save/{revenue_id}', 'RevenueController@edit_revenue_save')->defaults('identity', 'Revenue,u');

    Route::get('/delete_additional_revenue/{revenue_id}', 'RevenueController@delete_additional_revenue')->defaults('identity', 'Revenue,d');

    Route::post('status_filter', 'RevenueController@payment_filter')->defaults('identity', 'Revenue,r');
    Route::post('revenuemonth_filter', 'RevenueController@revenuemonth_filter')->defaults('identity', 'Revenue,r');

    Route::post('revenue_status_filter', 'RevenueController@RevenueFilter')->defaults('identity', 'Revenue,r');

    Route::get('revenue_data', 'RevenueController@revenue_data')->defaults('identity', 'Revenue,c');
    Route::get('edit_revenue/{company_id}', 'RevenueController@editRevenue')->defaults('identity', 'Additional Revenue,u');

    Route::post('revenueSave', 'RevenueController@revenueSave')->defaults('identity', 'Revenue,c');
    Route::post('updateRevenue/{company_id}', 'RevenueController@updateRevenue')->defaults('identity', 'Revenue,u');
    Route::get('deleteRevenue/{companyRevenueId}', 'RevenueController@deleteRevenue')->defaults('identity', 'Revenue,d');
    Route::post('additional_month_filter', 'RevenueController@additional_month_filter')->defaults('identity', 'Revenue,r');

    Route::post('revenue_filter_month', 'RevenueController@revenue_filter_month')->defaults('identity', 'Revenue,r');

    Route::get('combined_revenue/{date_flag?}/{date?}/','RevenueController@CombinedRevenue')->defaults('identity', 'Monthly Revenues Card,r');
    Route::get('MonthlyRevenue','RevenueController@MonthlyRevenue')->defaults('identity', 'Revenue,r');

    Route::get('changeStatus', 'EmployeeController@changeStatus')->defaults('identity', 'Member,u');
    Route::get('company_Status_change', 'CompanyController@companyStatuschange')->defaults('identity', 'Company,u');


    Route::get('companySeats/{companyId}','RevenueController@companySeats')->defaults('identity', 'Company,r');

    Route::get('fonik_active_member','CompanyController@fonik_active_member')->defaults('identity', 'Company,r');
    Route::get('fonik_active_employee_list/{member_id}','CompanyController@fonik_active_employee_list')->defaults('identity', 'Member,r');

    // ===============Revenue Export Import

    Route::get('export', 'RevenueController@export')->name('export')->defaults('identity', 'Revenue,r');
    Route::get('importExportView', 'RevenueController@importExportView')->defaults('identity', 'Revenue,r');
    Route::post('import', 'RevenueController@import')->name('import')->defaults('identity', 'Revenue,r');

    // ==================Expense routes begins=======================//
    Route::get('/expense/index/', 'ExpenseController@index')->name('view_expense')->defaults('identity', 'Expense,r');
    Route::get('/expense/create', 'ExpenseController@create')->name('add_expense')->defaults('identity', 'Expense,c');
    Route::get('/expense/store', 'ExpenseController@store')->name('store_expense')->defaults('identity', 'Expense,c');
    Route::get('/expense/edit/{expense_id}', 'ExpenseController@edit')->name('edit_expense')->defaults('identity', 'Expense,u');
    Route::post('/expense/update/{expense_id}', 'ExpenseController@update')->name('update_expense')->defaults('identity', 'Expense,u');
    Route::get('/expense/delete/{expense_id}', 'ExpenseController@destroyExpense')->name('delete_expense')->defaults('identity', 'Expense,d');

    // ==================Expense routes ends========================
    Route::get('createExpense', 'ExpenseController@create')->name('createExpense')->defaults('identity', 'Expense,c');

    Route::post('store-expense/{id}', 'ExpenseController@storeExpense')->name('storeExpense')->defaults('identity', 'Expense,c');

    Route::get('filter/{year}/{month}', 'ExpenseController@filterExpense')->name('filterExpense')->defaults('identity', 'Expense,r');

    Route::get('profit_vs_burns/', 'RevenueExpense@profit_vs_burns')->defaults('identity', 'Monthly P&L,r');
    Route::get('monthlyProfitDisplay/{date}', 'RevenueExpense@monthlyProfitDisplay')->defaults('identity', 'Monthly P&L,r');

    Route::get('monthly_due/', 'RevenueController@monthly_due')->defaults('identity', 'Revenue,r');
    Route::get('monthly_due_bar_click/{date}', 'RevenueController@monthlyDueBarClick')->defaults('identity', 'Revenue,r');
    Route::get('companies_monthly_due/{payment_month}', 'RevenueController@companies_monthly_due')->defaults('identity', 'Revenue,r');

    Route::get('revenue_filter/{year}/{month}', 'RevenueController@revenue_filter')->defaults('identity', 'Revenue,r');

    Route::get('revenue/company/{company_name}', 'RevenueController@revenueCompany')->defaults('identity', 'Monthly Revenues Card,v');

    Route::get('revenue/total', 'RevenueController@revenueTotal')->defaults('identity', 'Revenue,r');

    Route::get('first','RevenueExpense@first')->defaults('identity', 'Revenue,r');
    Route::get('bar-click/{label}/{state}', 'RevenueExpense@barClick')->defaults('identity', 'Revenue,r');
    Route::get('bar-click-revenue/{label}/{state}', 'RevenueExpense@revenuebarClick')->defaults('identity', 'Revenue,r');


    Route::get('revenue/company/invoice/{company_name}', 'RevenueController@companyInvoice')->name('companyInvoice')->defaults('identity', 'Revenue,r');

    Route::get('member_agreement/{company_id}', 'RevenueController@companyAgreementTable')->defaults('identity', 'Company,r');

}); 
