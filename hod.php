<?php
include('db.php');
session_start();
if (!isset($_SESSION['reg_no'])) {
    header("Location: login.php");
    exit();
}
$reg_no = $_SESSION['reg_no'];
$query = "
    SELECT login.user_id, student.name, student.dept, student.year
    FROM login
    JOIN student ON login.user_id = student.user_id
    WHERE login.user_id = '$reg_no'
";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $name = $user_data['name'];
    $department = $user_data['dept'];
    $year = $user_data['year'];
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
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
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
            <nav class="navbar top-navbar navbar-expand-md ">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">


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
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="card" style="margin-top: 20px;">
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Pending" role="tab">
                                    <i class="mdi mdi-book-open"></i>Pending
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#Approval" role="tab">
                                    <i class="mdi mdi-book-open"></i>Approval
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <!-- Pending Tab -->
                            <div class="tab-pane active" id="Pending" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">S.No</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Application.No</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Category of pass</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Date</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Reason</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("db.php");

                                            $query = "SELECT id, category, date, reason, status FROM leaveapply WHERE status = '1'";
                                            $result = mysqli_query($conn, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $s = 1;
                                                $app = 100;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $s; ?></td>
                                                        <td class="text-center"><?php echo $app; ?></td>
                                                        <td class="text-center"><?php echo $row['category']; ?></td>
                                                        <td class="text-center"><?php echo $row['date']; ?></td>
                                                        <td class="text-center"><?php echo $row['reason']; ?></td>
                                                        <td>
                                                            <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-success btnuserapprove">Approve</button>
                                                            <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger btnReject">Reject</button>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $s++;
                                                    $app++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                                            }

                                            mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Approval Tab -->
                            <div class="tab-pane" id="Approval" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">S.No</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Application.No</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Category of pass</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Date</th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">Reason</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("db.php");

                                            $query = "SELECT id, category, date, reason, status FROM leaveapply WHERE status = '2'";
                                            $result = mysqli_query($conn, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $s = 1;
                                                $app = 100;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $s; ?></td>
                                                        <td class="text-center"><?php echo $app; ?></td>
                                                        <td class="text-center"><?php echo $row['category']; ?></td>
                                                        <td class="text-center"><?php echo $row['date']; ?></td>
                                                        <td class="text-center"><?php echo $row['reason']; ?></td>
                                                        
                                                    </tr>
                                            <?php
                                                    $s++;
                                                    $app++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                                            }

                                            mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <p>the mic out</p>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addnewtask').DataTable();
        });

        $(document).on('click', '.btnuserapprove', function(e) {
            e.preventDefault();
            var leaveId = $(this).val();
            console.log(leaveId);

            if (confirm('Are you sure you want to approve?')) {
                // Send AJAX request to update the status to '2'
                $.ajax({
                    url: "back.php",
                    type: "POST",
                    data: {
                        id: leaveId
                    },
                    success: function(response) {
                        if (response === "Success") {
                            // Hide the row corresponding to the approved leave application
                            $("button[value='" + leaveId + "']").closest("tr").fadeOut();
                        } else {
                            alert("Error: " + response);
                        }
                    },
                    error: function() {
                        alert("An error occurred while processing the request.");
                    }
                });
            }
        });

        $(document).on('click', '.btnReject', function(e) {
            e.preventDefault();
            var leaveId = $(this).val();
            console.log(leaveId);

            if (confirm('Are you sure you want to reject?')) {
                // Send AJAX request to update the status to '5' (Rejected)
                $.ajax({
                    url: "back.php",
                    type: "POST",
                    data: {
                        id: leaveId,
                        action: 'reject'
                    },
                    success: function(response) {
                        if (response === "Success") {
                            // Hide the row corresponding to the rejected leave application
                            $("button[value='" + leaveId + "']").closest("tr").fadeOut();
                        } else {
                            alert("Error: " + response);
                        }
                    },
                    error: function() {
                        alert("An error occurred while processing the request.");
                    }
                });
            }
        });
    </script>

</body>

</html>