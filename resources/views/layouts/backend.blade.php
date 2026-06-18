
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
            overflow:hidden;
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

    <a href="{{ route('appointments.index') }}">
        Appointments
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