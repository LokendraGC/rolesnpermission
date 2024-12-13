<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
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
});
