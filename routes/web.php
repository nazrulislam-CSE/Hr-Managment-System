<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\EmployeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\BankingController;
use App\Http\Controllers\Backend\TransferController;
use App\Http\Controllers\Backend\ProductController;



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
    return view('welcome');
});


/*================== Backend Admin All Routes ==============*/
Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
	Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
	Route::get('/logout',[AdminController::class, 'AminLogout'])->name('admin.logout');
});

Route::prefix('clients')->group(function(){
	Route::get('/index', [ClientController::class, 'index'])->name('client.index');
	Route::get('/create', [ClientController::class, 'create'])->name('client.create');
	Route::post('/store', [ClientController::class, 'store'])->name('client.store');
	Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
	Route::post('/update/{id}', [ClientController::class, 'update'])->name('client.update');
	Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');
	Route::get('/active/{id}', [ClientController::class, 'active'])->name('client.active');
	Route::get('/inactive/{id}', [ClientController::class, 'inactive'])->name('client.in_active');
});

Route::prefix('departments')->group(function(){
	Route::get('/index', [DepartmentController::class, 'index'])->name('department.index');
	Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
	Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
	Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
	Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
	Route::get('/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');
	Route::get('/active/{id}', [DepartmentController::class, 'active'])->name('department.active');
	Route::get('/inactive/{id}', [DepartmentController::class, 'inactive'])->name('department.in_active');
});

Route::prefix('notice')->group(function(){
	Route::get('/index', [NoticeController::class, 'index'])->name('notice.index');
	Route::get('/create', [NoticeController::class, 'create'])->name('notice.create');
	Route::post('/store', [NoticeController::class, 'store'])->name('notice.store');
	Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
	Route::post('/update/{id}', [NoticeController::class, 'update'])->name('notice.update');
	Route::get('/delete/{id}', [NoticeController::class, 'destroy'])->name('notice.delete');
	Route::get('/active/{id}', [NoticeController::class, 'active'])->name('notice.active');
	Route::get('/inactive/{id}', [NoticeController::class, 'inactive'])->name('notice.in_active');
});

Route::prefix('leaves')->group(function(){
	Route::get('/index', [LeaveController::class, 'index'])->name('leave.index');
	Route::get('/create', [LeaveController::class, 'create'])->name('leave.create');
	Route::post('/store', [LeaveController::class, 'store'])->name('leave.store');
	Route::get('/edit/{id}', [LeaveController::class, 'edit'])->name('leave.edit');
	Route::post('/update/{id}', [LeaveController::class, 'update'])->name('leave.update');
	Route::get('/delete/{id}', [LeaveController::class, 'destroy'])->name('leave.delete');
	Route::get('/active/{id}', [LeaveController::class, 'active'])->name('leave.active');
	Route::get('/inactive/{id}', [LeaveController::class, 'inactive'])->name('leave.in_active');
});

Route::prefix('employes')->group(function(){
	Route::get('/index', [EmployeController::class, 'index'])->name('employe.index');
	Route::get('/create', [EmployeController::class, 'create'])->name('employe.create');
	Route::post('/store', [EmployeController::class, 'store'])->name('employe.store');
	Route::get('/edit/{id}', [EmployeController::class, 'edit'])->name('employe.edit');
	Route::post('/update/{id}', [EmployeController::class, 'update'])->name('employe.update');
	Route::get('/delete/{id}', [EmployeController::class, 'destroy'])->name('employe.delete');
	Route::get('/active/{id}', [EmployeController::class, 'active'])->name('employe.active');
	Route::get('/inactive/{id}', [EmployeController::class, 'inactive'])->name('employe.in_active');

	Route::get('/employe/index', [EmployeController::class, 'employ_sallary'])->name('employe.sallary');
	Route::get('/employe/sallary/{id}', [EmployeController::class, 'employe_sallary_index'])->name('employe.sallary.index');
	Route::post('/employe/sallary/store', [EmployeController::class, 'employe_sallary_store'])->name('employe_sallary.store');


});

Route::prefix('roles')->group(function(){
	Route::get('/index', [RoleController::class, 'index'])->name('role.index');
	Route::get('/create', [RoleController::class, 'create'])->name('role.create');
	Route::post('/store', [RoleController::class, 'store'])->name('role.store');
	Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
	Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update');
	Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');
});

Route::prefix('banking')->group(function(){
	Route::get('/index', [BankingController::class, 'index'])->name('banking.index');
	Route::get('/create', [BankingController::class, 'create'])->name('banking.create');
	Route::post('/store', [BankingController::class, 'store'])->name('banking.store');
	Route::get('/edit/{id}', [BankingController::class, 'edit'])->name('banking.edit');
	Route::post('/update/{id}', [BankingController::class, 'update'])->name('banking.update');
	Route::get('/delete/{id}', [BankingController::class, 'destroy'])->name('banking.delete');
	Route::get('/active/{id}', [BankingController::class, 'active'])->name('banking.active');
	Route::get('/inactive/{id}', [BankingController::class, 'inactive'])->name('banking.in_active');
});

Route::prefix('transfer')->group(function(){
	Route::get('/index', [TransferController::class, 'index'])->name('transfer.index');
	Route::get('/create', [TransferController::class, 'create'])->name('transfer.create');
	Route::post('/store', [TransferController::class, 'store'])->name('transfer.store');
	Route::get('/edit/{id}', [TransferController::class, 'edit'])->name('transfer.edit');
	Route::post('/update/{id}', [TransferController::class, 'update'])->name('transfer.update');
	Route::get('/delete/{id}', [TransferController::class, 'destroy'])->name('transfer.delete');
	Route::get('/active/{id}', [TransferController::class, 'active'])->name('transfer.active');
	Route::get('/inactive/{id}', [TransferController::class, 'inactive'])->name('transfer.in_active');
});

Route::prefix('product')->group(function(){
	Route::get('/index', [ProductController::class, 'index'])->name('product.index');
	Route::get('/create', [ProductController::class, 'create'])->name('product.create');
	Route::post('/store', [ProductController::class, 'store'])->name('product.store');
	Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
	Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
	Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
	Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');
	Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('product.in_active');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
