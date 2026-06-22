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
use Backend\Modules\Clinical\Appointments\Controllers\AppointmentController;
use Backend\Modules\Clinical\Consultations\Controllers\ConsultationController;
use Backend\Modules\Clinical\Diagnoses\Controllers\DiagnosisController;
use Backend\Modules\Clinical\Prescriptions\Controllers\PrescriptionController;
use Backend\Modules\Clinical\LabOrders\Controllers\LabOrderController;
use Backend\Modules\Clinical\Radiology\Controllers\RadiologyController;
use Backend\Modules\Operations\Controllers\AdmissionController;
use Backend\Modules\Operations\Controllers\DischargeController;
use Backend\Modules\Operations\Controllers\WardManagementController;
use Backend\Modules\Operations\Controllers\NursingController;
use Backend\Modules\Operations\Controllers\SchedulingController;
use Backend\Modules\Finance\Controllers\InvoiceController;
use Backend\Modules\Finance\Controllers\PaymentController;
use Backend\Modules\Finance\Controllers\BillingController;
use Backend\Modules\Finance\Controllers\InsuranceController;
use Backend\Modules\Finance\Controllers\ExpenseController;
use Backend\Modules\Finance\Controllers\PayrollController;
use Backend\Modules\Reports\Controllers\FinancialReportController;
use Backend\Modules\Reports\Controllers\ClinicalReportController;
use Backend\Modules\Reports\Controllers\AuditLogController;
use Backend\Modules\Reports\Controllers\AnalyticsController;
use Backend\Modules\Inventory\Controllers\SupplierController;
use Backend\Modules\Inventory\Controllers\CategoryController;
use Backend\Modules\Inventory\Controllers\ProductController;
use Backend\Modules\Inventory\Controllers\StockInController;
use Backend\Modules\Inventory\Controllers\StockOutController;
use Backend\Modules\Inventory\Controllers\PurchaseOrderController;
use Backend\Modules\HRM\Controllers\EmployeeController;
use Backend\Modules\HRM\Controllers\HRMDepartmentController;
use Backend\Modules\HRM\Controllers\DesignationController;
use Backend\Modules\HRM\Controllers\LeaveController;
use Backend\Modules\HRM\Controllers\AttendanceController;
use Backend\Modules\UserManagement\Controllers\UserController;
use Backend\Modules\UserManagement\Controllers\RoleController;
use Backend\Modules\UserManagement\Controllers\PermissionController;
use Backend\Modules\Notifications\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;

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

    Route::resource(
    'consultations',
    ConsultationController::class
    );

    Route::resource(
    'diagnoses',
    DiagnosisController::class
    );

    Route::resource(
    'prescriptions',
    PrescriptionController::class
    );

    Route::resource(
    'laborders',
    LabOrderController::class
    );

    Route::resource(
    'radiology',
    RadiologyController::class
    );

    Route::resource(
    'admissions',
    AdmissionController::class
    );

    Route::resource(
    'discharges',
    DischargeController::class
    );

    Route::resource(
    'wardmanagement',
    WardManagementController::class
    );

    Route::resource(
    'nursing',
    NursingController::class
    );

    Route::resource(
    'scheduling',
    SchedulingController::class
    );

    Route::resource(
    'invoices',
    InvoiceController::class
    );

    Route::resource(
    'payments',
    PaymentController::class
    );

    Route::resource(
    'billings',
    BillingController::class
    );

    Route::resource(
    'insurances',
    InsuranceController::class
    );

    Route::resource(
    'expenses',
    ExpenseController::class
    );

    Route::resource(
    'payrolls',
    PayrollController::class
    );

    
    Route::get(
        'financialreports',
        [FinancialReportController::class,'index']
    )->name('financialreports.index');

    Route::get(
    'clinicalreports',
    [ClinicalReportController::class,'index']
    )->name('clinicalreports.index');
    
    Route::get(
        'auditlogs',
        [AuditLogController::class,'index']
    )->name('auditlogs.index');
    
    Route::get(
        'analytics',
        [AnalyticsController::class,'index']
    )->name('analytics.index');


    Route::resource(
    'suppliers',
    SupplierController::class
    );
    
    Route::resource(
        'categories',
        CategoryController::class
    );
    
    Route::resource(
        'products',
        ProductController::class
    );

    
    Route::resource(
        'stockins',
        StockInController::class
    );
    
    Route::resource(
        'stockouts',
        StockOutController::class
    );
    
    Route::resource(
        'purchaseorders',
        PurchaseOrderController::class
    );

    
    Route::resource('employees', EmployeeController::class);
    
    Route::resource('hrmdepartments', HRMDepartmentController::class);
    
    Route::resource('designations', DesignationController::class);
    
    Route::resource('leaves', LeaveController::class);
    
    Route::resource('attendances', AttendanceController::class);

    Route::resource(
    'user',
    UserController::class
    );

    Route::resource(
    'roles',
    RoleController::class
    );

    Route::resource(
    'permissions',
    PermissionController::class
    );

    Route::resource(
    'notifications',
    NotificationController::class
    );

    
Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');

})->name('logout');

});

