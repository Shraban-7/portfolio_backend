<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Docs;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/dashboard', function () {

    $user_count=User::count();
    $document_count=Docs::count();
    return view('layouts.dashboard',compact('user_count','document_count'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('admin/document/list', [DocsController::class, 'index'])->name('docs.list');
    Route::get('admin/document/create', [DocsController::class, 'create'])->name('docs.create');
    Route::post('document/store', [DocsController::class, 'store'])->name('docs.store');
    Route::get('admin/document/create/{document}', [DocsController::class, 'edit'])->name('docs.edit');
    Route::get('document/show/{document}', [DocsController::class, 'show'])->name('docs.show');
    Route::post('admin/document/update/{document}', [DocsController::class, 'update'])->name('docs.update');
    Route::get('admin/document/delete/{document}', [DocsController::class, 'destroy'])->name('docs.delete');

    Route::get('department/list', [DeptController::class, 'index'])->name('department.list');
    Route::get('department/create', [DeptController::class, 'create'])->name('department.create');
    Route::post('department/store', [DeptController::class, 'store'])->name('department.store');
    Route::get('department/edit/{department}', [DeptController::class, 'edit'])->name('department.edit');
    Route::post('department/update/{department}', [DeptController::class, 'update'])->name('department.update');
    Route::get('department/delete/{department}', [DeptController::class, 'destroy'])->name('department.delete');

    Route::get('user/list', [UserController::class, 'index'])->name('user.list');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('user/update/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('permission/list', [PermissionController::class, 'index'])->name('permission.list');
// Route::get('permission/create',[PermissionController::class,'create'])->name('permission.create');
    Route::get('permission/edit/{permission}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::post('permission/update/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('permission/delete/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');

    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('role/update/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::get('role/delete/{role}', [RoleController::class, 'destroy'])->name('role.delete');


    // Route::resource('category',CategoryController::class);

    Route::get('category/create/',[CategoryController::class,'create'])->name('category.create');
    Route::post('category/store/',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{category}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category/delete/{category}',[CategoryController::class,'destroy'])->name('category.delete');

});

Route::middleware('auth')->group(function () {
    Route::get('/user_dashboard', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('user/document/create', [DocsController::class, 'createByUser'])->name('docs.create.user');
    Route::get('document/download/{document}', [DocsController::class, 'download'])->name('docs.download');
    Route::get('user/document/list', [DocsController::class, 'list_documents'])->name('user.docs.list');
    Route::get('document/show/{document}', [DocsController::class, 'show'])->name('docs.show');
    Route::get('document/delete/{document}', [DocsController::class, 'destroy'])->name('docs.delete');
    Route::post('document/store', [DocsController::class, 'store'])->name('docs.store');

});

require __DIR__ . '/auth.php';
