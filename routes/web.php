<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [TeacherController::class, 'index'])->name('home');

//Admin
Route::get('/home/admin/form/login', [AdminController::class, 'formLoginAdmin'])->name('formLoginAdmin');
Route::post('/home/admin/login', [AdminController::class, 'loginAdmin'])->name('loginAdmin');

// Professor
Route::get('/home/registerTeacher', [TeacherController::class, 'formRegisterTeacher'])->name('formRegisterTeacher');
Route::post('/home/storeTeacher', [TeacherController::class, 'storeTeacher'])->name('registerTeacher');
Route::get('/home/loginTeacher', [TeacherController::class, 'formLoginTeacher'])->name('formLoginTeacher');
Route::post('/home/loginTeacher_do', [TeacherController::class, 'loginTeacher'])->name('loginTeacher');
Route::get('/logout', [TeacherController::class, 'logout'])->name('logoutTeacher');
Route::get('/list', [TeacherController::class, 'listUsers'])->name('listUsers');
Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [TeacherController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [TeacherController::class, 'destroy'])->name('destroy');
Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');

    // Atividades
    Route::get('/home/createActivity', [TeacherController::class, 'createActivity'])->name('createActivity');
    Route::post('/home/storeActivity', [TeacherController::class, 'storeActivity'])->name('storeActivity');
    Route::get('/home/listActivities', [TeacherController::class, 'listActivities'])->name('listActivities');
    Route::get('/home/activity/{id_activity}', [TeacherController::class, 'showActivity'])->name('showActivity');
    Route::get('/home/activity/edit/{id_activity}', [TeacherController::class, 'editActivity'])->name('editActivity');
    Route::put('/home/activity/update/{id_activity}', [TeacherController::class, 'updateActivity'])->name('updateActivity');
    Route::delete('/home/activity/delete/{id_activity}', [TeacherController::class, 'destroyActivity'])->name('deleteActivity');


// Aluno
Route::get('/home/registerStudent', [StudentController::class, 'create'])->name('formRegisterStudent');
Route::post('/home/storeStudent', [StudentController::class, 'store'])->name('registerStudent');
Route::get('/home/loginStudent', [StudentController::class, 'formLoginStudent'])->name('formLoginStudent');
Route::post('/home/loginStudent_do', [StudentController::class, 'loginStudent'])->name('loginStudent');
Route::get('/home/editar/{id}', [StudentController::class, 'edit'])->name('editStudent');
Route::put('/home/update/{id}', [StudentController::class, 'update'])->name('updateStudent');
Route::get('/listStudents', [StudentController::class, 'listStudents'])->name('listStudents');
Route::get('home/status/{id}/{active_code}', [StudentController::class, 'updateActive'])->name('updateActive');

//Disciplinas

Route::get('/home/disciplines', [DisciplineController::class, 'show'])->name('listDisciplines');
Route::get('/home/disciplines/create', [DisciplineController::class, 'create'])->name('formRegisterDisciplines');
Route::post('/home/disciplines/store', [DisciplineController::class, 'store'])->name('registerDisciplines');
Route::get('/home/disciplines/editar/{id}', [DisciplineController::class, 'edit'])->name('editDiscipline');
Route::put('/home/disciplines/update/{id}', [DisciplineController::class, 'update'])->name('updateDiscipline');
Route::delete('/home/disciplines/delete/{id}', [DisciplineController::class, 'destroy'])->name('deleteDiscipline');

//Respostas

Route::get('/home/activity/response/create/{id_activity}', [ResponseController::class, 'create'])->name('createResponse');
Route::post('/home/activity/response/store/{id_activity}', [ResponseController::class, 'store'])->name('storeResponse');


