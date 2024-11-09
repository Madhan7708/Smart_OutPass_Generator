<?php
include ('db.php');
session_start();
if (!isset($_SESSION['reg_no'])) {
    header("Location: login.php");
    exit();
}
$reg_no = $_SESSION['reg_no'];
$query = "
    SELECT login.user_id, student.name, student.dept, student.year,student.dob, student.mentorname,student.fname,student.fmobileno,student.smobileno
    FROM login
    JOIN student ON login.user_id = student.user_id
    WHERE login.user_id = '$reg_no'
";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $name = $user_data['name'];
    $dept = $user_data['dept'];
    $year = $user_data['year'];
    $dob = $user_data['dob'];
    $mentorn = $user_data['mentorname'];
    $fname = $user_data['fname'];
    $fmobileno = $user_data['fmobileno'];
    $smobileno = $user_data['smobileno'];


} else {
    echo "<script>alert('Unable to retrieve user details.');</script>";
    $name = "N/A";
    $department = "N/A";
    $year = "N/A";
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->

                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">My Profile</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="apply.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Apply Outpass</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Log Out</span></a></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <div class="card" style="padding: 20px; max-width: 500px; margin: 20px auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #f9f9f9;">
    <div class="card-body" style="text-align: center;">
        <h5 class="card-title" style="font-size: 24px; font-weight: bold; color: #4a4a4a; margin-bottom: 20px;">My Profile Information</h5>
        <table style="width: 100%; font-size: 16px;">
            <tbody>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Reg.No:</td>
                    <td style="padding: 10px;"><?php echo $reg_no ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Name:</td>
                    <td style="padding: 10px;"><?php echo $name ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Date Of Birth:</td>
                    <td style="padding: 10px;"><?php echo $dob ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Department:</td>
                    <td style="padding: 10px;"><?php echo $dept ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Mentor Name:</td>
                    <td style="padding: 10px;"><?php echo $mentorn ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Father Name:</td>
                    <td style="padding: 10px;"><?php echo $fname ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Father No:</td>
                    <td style="padding: 10px;"><?php echo $fmobileno ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px; font-weight: bold; color: #4a4a4a;">Student Number:</td>
                    <td style="padding: 10px;"><?php echo $smobileno ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>






            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <footer class="footer text-center">
                <p>the mic out</p>
            </footer>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>