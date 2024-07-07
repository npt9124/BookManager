<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Frontend
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Backend
Route::get('/Admin_login', [App\Http\Controllers\AdminController::class, 'index'])->name('Admin_login');

Route::get('/Admin', [App\Http\Controllers\AdminController::class, 'Admin'])->name('Admin');
Route::get('/Adminn', [App\Http\Controllers\AdminController::class, 'Adminn'])->name('Adminn');
Route::get('/Dashboard', [App\Http\Controllers\AdminController::class, 'show_dashboard'])->name('Dashboard');
Route::post('/Dashboard', [App\Http\Controllers\AdminController::class, 'Dashboard'])->name('Dashboard');
Route::post('/Admin-dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('Admin-dashboard');
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
//Book
Route::get('/add-book', [App\Http\Controllers\ManageBook::class, 'add_book'])->name('add-book');
Route::post('/store', [App\Http\Controllers\ManageBook::class, 'store'])->name('store');
Route::post('/save-book', [App\Http\Controllers\ManageBook::class, 'save_book'])->name('save-book');
Route::get('/edit-book/{book_id}', [App\Http\Controllers\ManageBook::class, 'edit_book'])->name('edit-book');
Route::get('/delete-book/{book_id}', [App\Http\Controllers\ManageBook::class, 'delete_book'])->name('delete-book');
Route::get('/all-book', [App\Http\Controllers\ManageBook::class, 'all_book'])->name('all-book');
Route::get('/unactive-book/{book_id}', [App\Http\Controllers\ManageBook::class, 'unactive_book'])->name('unactive-book');
Route::get('/active-author/{book_id}', [App\Http\Controllers\ManageBook::class, 'active_author'])->name('active-author');
Route::post('/update-book/{book_id}', [App\Http\Controllers\ManageBook::class, 'update_book'])->name('update-book');
Route::get('/add-author', [App\Http\Controllers\ManageBook::class, 'add_author'])->name('add-author');
Route::post('/save-author', [App\Http\Controllers\ManageBook::class, 'save_author'])->name('save-author');
Route::get('/delete-author/{author_id}', [App\Http\Controllers\ManageBook::class, 'delete_author'])->name('delete-author');
Route::get('/all-author', [App\Http\Controllers\ManageBook::class, 'all_author'])->name('all-author');
Route::get('/add-book', [App\Http\Controllers\ManageBook::class, 'create'])->name('add-book');

//
Route::get('/books/create', [App\Http\Controllers\ManageBook::class, 'create'])->name('books.create');
Route::post('/books', [App\Http\Controllers\ManageBook::class, 'store'])->name('books.store');
//Reader
Route::get('/add-reader', [App\Http\Controllers\ManageReader::class, 'add_reader'])->name('add-reader');
Route::post('/save-reader', [App\Http\Controllers\ManageReader::class, 'save_reader'])->name('save-reader');
Route::get('/edit-reader/{reader_id}', [App\Http\Controllers\ManageReader::class, 'edit_reader'])->name('edit-reader');
Route::get('/delete-reader/{reader_id}', [App\Http\Controllers\ManageReader::class, 'delete_reader'])->name('delete-reader');
Route::get('/all-reader', [App\Http\Controllers\ManageReader::class, 'all_reader'])->name('all-reader');
Route::get('/unactive-reader/{reader_id}', [App\Http\Controllers\ManageReader::class, 'unactive_reader'])->name('unactive-reader');
Route::get('/active-reader/{reader_id}', [App\Http\Controllers\ManageReader::class, 'active_reader'])->name('active-reader');
Route::post('/update-reader/{reader_id}', [App\Http\Controllers\ManageReader::class, 'update_reader'])->name('update-reader');
//Status
Route::get('/manage-status', [App\Http\Controllers\ManageStatus::class, 'index'])->name('manage-status');
Route::get('/manage-status', [App\Http\Controllers\ManageStatus::class, 'index'])->name('manage-status');
Route::get('/manage-status/{loan_id}', [App\Http\Controllers\ManageStatus::class, 'update-status'])->name('manage-status');
//Loan
Route::get('/all-loan', [App\Http\Controllers\LoanController::class, 'all_loan'])->name('all-loan');
Route::get('/add-loan', [App\Http\Controllers\LoanController::class, 'create'])->name('add-loan');
Route::post('/save-loan', [App\Http\Controllers\LoanController::class, 'save_loan'])->name('save-loan');
Route::get('/edit-loan/{loan_id}', [App\Http\Controllers\LoanController::class, 'edit_loan'])->name('edit-loan');
Route::get('/delete-loan/{loan_id}', [App\Http\Controllers\LoanController::class, 'delete_loan'])->name('delete-loan');
//Login
Route::get('/admin-login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('admin-login');
Route::post('/admin-login', [App\Http\Controllers\AuthController::class, 'login'])->name('admin-login');
Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'show_dashboard'])->name('dashboard');
Route::post('/dashboard', [App\Http\Controllers\AuthController::class, 'login'])->name('dashboard');
Route::get('/admin-register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('admin-register');
Route::post('/admin-register', [App\Http\Controllers\AuthController::class, 'register'])->name('admin-register');
Route::get('/all-admin', [App\Http\Controllers\AuthController::class, 'all_admin'])->name('all-admin');
Route::get('/unactive-admin/{admin_id}', [App\Http\Controllers\AuthController::class, 'unactive_admin'])->name('unactive-admin');
Route::get('/active-admin/{admin_id}', [App\Http\Controllers\AuthController::class, 'active_admin'])->name('active-admin');
Route::get('/delete-admin/{admin_id}', [App\Http\Controllers\AuthController::class, 'delete_admin'])->name('delete-admin');
Route::get('/edit-admin/{admin_id}', [App\Http\Controllers\AuthController::class, 'edit_admin'])->name('edit-admin');
Route::post('/update-admin/{admin_id}', [App\Http\Controllers\AuthController::class, 'update_admin'])->name('update-admin');

//bor
//Route::get('/Dashboard', 'DashboardController@index')->name('dashboard');
//Route::get('/Admin_register', 'AuthController@showRegistrationForm')->name('admin-register');
//Route::post('/Ddmin_register', 'AuthController@register')->name('admin-submit');
