<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TechniciansController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/form', [FormController::class, 'form']);
Route::post('/create-user', [FormController::class, 'crateUser'])->name('createUser');

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/add-student', [StudentController::class, 'studentForm']);
Route::get('/edit-student/{id}', [StudentController::class, 'studentEdit'])->name('student.edit');
Route::get('/all-student', [StudentController::class, 'allStudent'])->name('student.list');
Route::post('/student-store', [StudentController::class, 'studentCreate'])->name('student.store');
Route::post('/student-update', [StudentController::class, 'studentUpdate'])->name('student.update');
Route::get('/student-delete/{id}', [StudentController::class, 'studentDelete'])->name('student.delete');

Route::get('/signup', function () {
    return view('pages.back.signup');
})->name('signup');

Route::get('/login', function () {
    return view('pages.back.login');
})->name('login');

Route::get('/admin', function () {
    return view('pages.back.home');
})->name("dashboard")->middleware('is_admin');

Route::get('/add-service', function () {
    return view('pages.back.services.add');
})->name('add.service');

Route::post('/user/signup/store', [UserController::class, 'userStore'])->name('user.signup.store');
Route::post('/user/login', [UserController::class, 'loginCheck'])->name('loginCheck');
Route::get('/user/logout', [UserController::class, 'logout'])->name('logout');

// service
Route::post('/service-store', [ServiceController::class, 'serviceStore'])->name('service.store');
Route::get('/service-list', [ServiceController::class, 'serviceList'])->name('service.list');

//send email
Route::get('/send-email', [MailController::class, 'sendEmail']);

//tecnicians
Route::post('/technicians-store', [TechniciansController::class, 'techniciansStore'])->name('technicians.store');
Route::post('/technicians-update', [TechniciansController::class, 'technicianUpdate'])->name('technician.update');
Route::get('/admin/technicians/add', [TechniciansController::class, 'techniciansAdd'])->name('add.technicians');
Route::get('/admin/technicians/list', [TechniciansController::class, 'techniciansList'])->name('technicians.list');
Route::get('/admin/technicians/edit/{id}', [TechniciansController::class, 'technicianEdit'])->name('technicians.edit');
Route::get('/admin/technicians/delete/{id}', [TechniciansController::class, 'technicianDelete'])->name('technician.delete');

//booking
Route::post('/booking-store', [BookingController::class, 'bookingStore'])->name('booking.store');
Route::get('/admin/booking/list', [BookingController::class, 'bookingList'])->name('booking.list');
