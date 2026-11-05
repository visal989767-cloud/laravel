<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('home');
});

Route::get('/index', function () {
    return view('index');
});

// Product views
Route::get('/product/listproduct', function () {
    return view('product.listproduct');
});

Route::get('/product/addproduct', function () {
    return view('product.addproduct');
});

// Category views
Route::get('/category/show', function () {
    return view('category.listcategory');
});

Route::get('/category/create', function () {
    return view('category.addcategory');
});

Route::get('/student/info/allstudent', [StudentController::class, 'show']);
Route::get('/product/create', [StudentController::class, 'create']);

Route::get('/employee/home', [EmployeeController::class, 'home']);
Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::match(['GET', 'POST'], '/employee/store', [EmployeeController::class, 'store']);
Route::match(['GET', 'POST'], '/employee/save', [EmployeeController::class, 'store']); // alias for demo URL testing
Route::get('/employee/detail/{empid}/{empname}/{position}', [EmployeeController::class, 'detail']);
Route::get('/employee/detial/{empid}/{empname}/{position}', [EmployeeController::class, 'detial']);
Route::get('/employee/edit/{empid}/{empname}/{position}', [EmployeeController::class, 'edit']);
Route::match(['GET', 'POST'], '/employee/update/{empid}', [EmployeeController::class, 'update']);
Route::get('/employee/delete/{empid}', [EmployeeController::class, 'delete']);

Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/category/list', [CategoryController::class, 'show']);
Route::get('/category/add', [CategoryController::class, 'create']);
Route::get('/product/list', [ProductController::class, 'listproduct']);
Route::get('/product/add', [ProductController::class, 'addproduct']);
