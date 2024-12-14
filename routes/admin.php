<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'loginUser'])->name('admin.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'userAdmin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Roles
    Route::get('dashboard/roles', [RoleController::class, 'list'])->name('roles');
    Route::get('dashboard/add-roles', [RoleController::class, 'addRole'])->name('addRole');
    Route::post('dashboard/store-roles', [RoleController::class, 'insert'])->name('add.roles');
    Route::get('dashboard/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit.role');
    Route::post('dashboard/update-role/{id}', [RoleController::class, 'updateRole'])->name('update.role');
    Route::get('dashboard/delete-role/{id}', [RoleController::class, 'deleteRole'])->name('delete.role');

    // users
    Route::get('dashboard/users', [UserController::class, 'index'])->name('show.users');
    Route::get('dashboard/add-user', [UserController::class, 'addUser'])->name('addUser');
    Route::post('dashboard/store-user', [UserController::class, 'insert'])->name('add.user');
    Route::get('dashboard/edit-user/{id}', [UserController::class, 'editUser'])->name('edit.user');
    Route::post('dashboard/update-user/{id}', [UserController::class, 'updateUser'])->name('update.user');
    Route::get('dashboard/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');

    // products
    Route::view('dashboard/products', 'backend.products.index')->name('products');

    // categories
    Route::view('dashboard/categories', 'backend.categories.index')->name('categories');
});
