
<!DOCTYPE html>
<html>
<head>

    <title>Hospital ERP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>

        body{
            overflow-x:hidden;
        }

        .sidebar{
            width:70px;
            height:100vh;
            background:#1f2937;
            position:fixed;
            transition:.3s;
            /* overflow:hidden; */
            overflow-y:auto;
            overflow-x:hidden;
        }

        .sidebar::-webkit-scrollbar{
        width:5px;
        }

        .sidebar::-webkit-scrollbar-thumb{
            background:#4b5563;
            border-radius:10px;
        }

        .sidebar{
        width:70px;
        position:fixed;
        top:0;
        left:0;
        bottom:0;

        background:#1f2937;

        overflow-y:auto;
        overflow-x:hidden;

        transition:.3s;
        }

        .sidebar:hover{
            width:280px;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:12px 20px;
        }

        .sidebar a:hover{
            background:#374151;
        }

        .content{
            margin-left:70px;
            padding:20px;
            transition:.3s;
        }

        .sidebar:hover ~ .content{
            margin-left:280px;
        }

        /* .submenu{
            display:none;
        } */

        .submenu{
        display:none;
        padding-left:20px;
        background:#111827;
        }
        
        .submenu.show{
        display:block;
        }

    </style>

</head>
<body>

<div class="sidebar">

    <h4 class="text-center text-white mt-3">
        Hospital Management
    </h4>

    <hr class="text-secondary">

    <a href="/admin">
        <i class="fa fa-home"></i>
        Dashboard
    </a>

    <a href="javascript:void(0)"
       onclick="toggleMenu('foundation')">

        <i class="fa fa-database"></i>

        Core Foundation

    </a>

    <div id="foundation" class="submenu">

        <a href="/admin/patients">Patients</a>

        <a href="/admin/doctors">Doctors</a>

        <a href="/admin/departments">Departments</a>

        <a href="/admin/specializations">Specializations</a>

        <a href="/admin/branches">Branches</a>

        <a href="/admin/rooms">Rooms</a>

        <a href="/admin/beds">Beds</a>

        <a href="/admin/staff">Staff</a>

    </div>

    <a href="javascript:void(0)"
       onclick="toggleMenu('clinical')">

        <i class="fa fa-database"></i>

        Clinical

    </a>

    <div id="clinical" class="submenu">

        <a href="/admin/appointments">Appointments</a>

        <a href="/admin/consultations">Consultations</a>

        <a href="/admin/diagnoses">Diagnoses</a>

        <a href="/admin/prescriptions">Prescriptions</a>

        <a href="/admin/laborders">LabOrders</a>

        <a href="/admin/radiology">Radiology</a>

    </div>

    <a href="javascript:void(0)"
   onclick="toggleMenu('operations')">

    <i class="fa fa-hospital"></i>

    Operations

</a>

<div id="operations" class="submenu">

    <a href="/admin/admissions">
        Admissions
    </a>

    <a href="/admin/discharges">
        Discharges
    </a>

    <a href="/admin/wardmanagement">
        Ward Management
    </a>

    <a href="/admin/nursing">
        Nursing
    </a>

    <a href="/admin/scheduling">
        Scheduling
    </a>

</div>

<a href="javascript:void(0)"
onclick="toggleMenu('finance')">

<i class="fa fa-money-bill"></i>

Finance

</a>

<div id="finance" class="submenu">

<a href="/admin/invoices">
Invoices
</a>

<a href="/admin/payments">
    Payments
</a>

<a href="/admin/billings">
        Billing
    </a>
    
<a href="/admin/insurances">
        Insurance
    </a>

    <a href="/admin/expenses">
        Expenses
    </a>

    <a href="/admin/payrolls">
        Payroll
    </a>

</div>

    
<a href="javascript:void(0)"
onclick="toggleMenu('reports')">

<i class="fa fa-money-bill"></i>

Reports

</a>

<div id="reports" class="submenu">

<a href="/admin/financialreports">
    Financial Reports
</a>

<a href="/admin/clinicalreports">
    Clinical Reports
</a>

<a href="/admin/auditlogs">
    Audit Logs
</a>

<a href="/admin/analytics">
    Analytics
</a>

</div>

        <a href="javascript:void(0)"
onclick="toggleMenu('inventory')">

<i class="fa fa-box"></i>

Inventory

</a>

<div id="inventory" class="submenu">

<a href="/admin/suppliers">
Suppliers
</a>

<a href="/admin/categories">
Categories
</a>

<a href="/admin/products">
Products
</a>

<a href="/admin/stockins">
Stock In
</a>

<a href="/admin/stockouts">
Stock Out
</a>

<a href="/admin/purchaseorders">
Purchase Orders
</a>

</div>

<a href="javascript:void(0)"
onclick="toggleMenu('hrm')">

<i class="fa fa-users"></i>

HRM

</a>

<div id="hrm" class="submenu">

<a href="/admin/employees">
Employees
</a>

<a href="/admin/hrmdepartments">
Departments
</a>

<a href="/admin/designations">
Designations
</a>

<a href="/admin/leaves">
Leaves
</a>

<a href="/admin/attendances">
Attendance
</a>

</div>

</div>

<div class="content">

    @yield('content')

</div>

<script>

function toggleMenu(id)
{
    document
        .getElementById(id)
        .classList
        .toggle('show');
}

</script>

</body>
</html>