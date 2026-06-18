<?php
use Backend\Modules\CoreAdministration\Patients\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Backend\Modules\CoreAdministration\Doctors\Controllers\DoctorController;
use Backend\Modules\CoreAdministration\Departments\Controllers\DepartmentController;
use Backend\Modules\CoreAdministration\Specializations\Controllers\SpecializationController;
use Backend\Modules\CoreAdministration\Branches\Controllers\BranchController;
use Backend\Modules\CoreAdministration\Rooms\Controllers\RoomController;
use Backend\Modules\CoreAdministration\Beds\Controllers\BedController;
use Backend\Modules\CoreAdministration\Staff\Controllers\StaffController;
use Backend\Modules\CoreAdministration\Appointments\Controllers\AppointmentController;

Route::prefix('admin')->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class,'index']
    )->name('dashboard');

    Route::resource(
        'patients',
        PatientController::class
    );

    Route::resource(
    'doctors',
    DoctorController::class
    );
    
    Route::resource(
    'departments',
    DepartmentController::class
    );

    Route::resource(
    'specializations',
    SpecializationController::class
    );

    Route::resource(
    'branches',
    BranchController::class
    );

    Route::resource(
    'rooms',
    RoomController::class
    );

    Route::resource(
    'beds',
    BedController::class
    );

    Route::resource(
    'staff',
    StaffController::class
    );

    Route::resource(
    'appointments',
    AppointmentController::class
    );

});

