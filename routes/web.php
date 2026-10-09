<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VisitController;



Route::get('/', [
    DashboardController::class,
    'index'
]);




// PATIENT

Route::get('/patients',[
    PatientController::class,
    'index'
]);


Route::get('/patients/create',[
    PatientController::class,
    'create'
]);


Route::post('/patients',[
    PatientController::class,
    'store'
]);


Route::get('/patients/{id}',[
    PatientController::class,
    'show'
]);


Route::get('/patients/{id}/edit',[
    PatientController::class,
    'edit'
]);


Route::put('/patients/{id}',[
    PatientController::class,
    'update'
]);


Route::delete('/patients/{id}',[
    PatientController::class,
    'destroy'
]);






// VISIT


Route::get('/visits',[
    VisitController::class,
    'index'
]);


Route::get('/visits/create',[
    VisitController::class,
    'create'
]);


Route::post('/visits',[
    VisitController::class,
    'store'
]);



Route::patch('/visits/{visit_no}/status',[
    VisitController::class,
    'updateStatus'
]);



Route::delete('/visits/{visit_no}',[
    VisitController::class,
    'destroy'
]);





// AJAX DOCTOR


Route::get('/api/doctors',[
    VisitController::class,
    'doctors'
]);