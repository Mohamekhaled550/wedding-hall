<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\EmailController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\InvoicesAttachmentsController;
use App\Http\Controllers\Dashboard\InvoicesDetailsController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\InvoiceReportController;
use App\Http\Controllers\Dashboard\StockController;
use App\Http\Controllers\Dashboard\StockMovementController;
use App\Http\Controllers\Dashboard\ProductIngredientController;
use App\Http\Controllers\Dashboard\IngredientController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/'                  , [AuthController::class , 'show_login'])->name('login');
Route::post('login-post'        , [AuthController::class , 'login'])->name('login.post');
Route::get('/logout'            , [AuthController::class , 'logout'])->name('logout');
Route::get('reset-password'     , [AdminController::class , 'resetPassword'])->name('reset-password');
Route::post('forget-password'   , [AdminController::class , 'forget_password'])->name('forget-password');


Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');





Route::prefix('admin')->middleware('localization')->name('admin.')->group(function () {

    /* Dashboard Routes */
    Route::middleware('auth')->group(function () {

        Route::get('/home'           , [HomeController::class , 'home'])->name('home');
        Route::resource('admins'     , AdminController::class);
        Route::resource('users'      , UserController::class)->except('show');
        Route::resource('sections'   , SectionController::class)->except('show');
        Route::resource('roles'      , RoleController::class)->except('show');
        Route::resource('products'   , ProductController::class)->except('show');
        Route::resource('settings'   , SettingsController::class)->only(['index' , 'update']);
        Route::resource('invoices'   , InvoiceController::class);
        Route::resource('ingredients', \App\Http\Controllers\Dashboard\IngredientController::class);
        Route::resource('product-ingredients', \App\Http\Controllers\Dashboard\ProductIngredientController::class);
        Route::resource('stocks', \App\Http\Controllers\Dashboard\StockController::class);
        Route::resource('stock-movements', \App\Http\Controllers\Dashboard\StockMovementController::class);
        Route::resource('categories', CategoryController::class);


        Route::get('send-email'   , [EmailController::class , 'send']);


        Route::get('edit-profile/{id}'     , [AdminController::class , 'editProfile'])->name('admins.edit-profile');
        Route::put('update-profile/{id}'   , [AdminController::class , 'updateProfile'])->name('admins.update-profile');





        Route::get('invoices/pay/{id}'                         , [InvoiceController::class , 'pay'])->name('invoices.pay');
        Route::post('/Status_Update/{id}'                      , [InvoiceController::class ,'Status_Updatee'])->name('Status_Updatee');

        Route::get('/section/{id}'                             , [InvoiceController::class , 'getproducts']);
        Route::get('/get_file/{file_name}/{invoice_number}'    , [InvoicesAttachmentsController::class , 'get_file'])->name('get_file');
        Route::get('/open_file/{file_name}/{invoice_number}'   , [InvoicesAttachmentsController::class , 'open_file'])->name('open_file');
        Route::delete('/attachments/destroy/{invoice_number}'  , [InvoicesAttachmentsController::class , 'destroy'])->name('attachments.destroy');
        Route::get('/attachments/create/{id}'                  , [InvoicesAttachmentsController::class , 'create'])->name('attachments.create');
        Route::post('/attachments/store'                       , [InvoicesAttachmentsController::class , 'store'])->name('attachments.store');

        Route::get('category-products/{section_id}'            , [SectionController::class , 'products']);
        Route::get('invoice-Paid'                              , [InvoiceController::class , 'Invoice_Paid'])->name('invoices-paid');
        Route::get('invoice-unPaid'                            , [InvoiceController::class , 'Invoice_Unpaid'])->name('invoices-unpaid');
        Route::get('invoice-partialPaid'                       , [InvoiceController::class , 'Invoice_Partial'])->name('invoices-partialpaid');
        Route::get('invoice-getArchives'                       , [InvoiceController::class , 'getArchives'])->name('invoices-getArchives');
        Route::get('invoice-restoreArchives/{id}'              , [InvoiceController::class , 'restoreArchives'])->name('invoices-restoreArchives');
        Route::get('invoice-print/{id}'                        , [InvoiceController::class , 'print'])->name('invoices-print');
        Route::get('invoice-calendar'                          , [InvoiceController::class, 'calendar'])->name('invoices.calendar');
        Route::delete('invoice-deleteArchives/{id}'            , [InvoiceController::class , 'deleteArchives'])->name('invoices-deleteArchives');
        Route::get('reports/home'                              , [InvoiceReportController::class, 'reportshome'])->name('reports.home');
        Route::get('reports'                                   , [InvoiceReportController::class, 'index'])->name('reports.index');
        Route::post('reports/search'                           , [InvoiceReportController::class, 'search'])->name('reports.search');
        Route::put('/invoices/update-paid/{id}', [InvoicesDetailsController::class, 'updatePaidAmount'])->name('invoices.updatePaidAmount');










    });

});
