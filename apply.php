<?php
include('db.php');
session_start();
if (!isset($_SESSION['reg_no'])) {
    header("Location: login.php");
    exit();
}
$reg_no = $_SESSION['reg_no'];

$query = "
    SELECT login.user_id, leaveapply.*
    FROM login
    JOIN leaveapply ON login.user_id = leaveapply.user_id
    WHERE login.user_id = '$reg_no'";

$result = mysqli_query($conn, $query);


$query1 = "
    SELECT login.user_id, student.mphoneno, student.name
    FROM login
    JOIN student ON login.user_id = student.user_id
    WHERE login.user_id = '$reg_no'
";
$result1 = mysqli_query($conn, $query1);

if ($result1 && mysqli_num_rows($result1) > 0) {
    $user_data = mysqli_fetch_assoc($result1);
    $mentor = $user_data['mphoneno'];
    $name = $user_data['name'];
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-top: 20px;">
                    Apply
                </button>
                <div class="card" style="margin-top: 20px;">
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">


                        <div class="card">
                            <div class="card-body" style="padding: 10px;">
                                <div class="table-responsive">
                                    <!--id:addnewtask-->


                                    <br>
                                    <table id="addnewtask" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                        <h5>S.No</h5>
                                                    </b></th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                        <h5>Application.No</h5>
                                                    </b></th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                        <h5>OutPass Details</h5>
                                                    </b></th>
                                                <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;"><b>
                                                        <h5>Action</h5>
                                                    </b></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                           

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $s = 1;
                                                $app = 100;

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $statusMessage = '';
                                                    switch ($row['status']) {
                                                        case 1:
                                                            $statusMessage = 'Pending';
                                                            break;
                                                        case 2:
                                                            $statusMessage = 'Approved By class Advisor';
                                                            break;
                                                        case 3:
                                                            $statusMessage = 'Approved By Hod';
                                                            break;
                                                        case 4:
                                                            $statusMessage = 'OUT';
                                                            break;
                                                        case 5:
                                                            $statusMessage = 'Class Advisior Rejected';
                                                            break;
                                                        case 6:
                                                            $statusMessage = 'Hod Rejected';
                                                            break;

                                                        default:
                                                            $statusMessage = 'Unknown Status';
                                                    }
                                            ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $s; ?></td>
                                                        <td class="text-center"><?php echo $app; ?></td>

                                                        <!-- Button to open the modal to view details -->
                                                        <td class="text-center">
                                                            <button type="button" class="btn viewcomplaint" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" style="font-size: 25px;">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </td>

                                                        <!-- Modal structure for displaying outpass details -->
                                                        <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="complaintDetailsModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                                <div class="modal-content" style="border-radius: 8px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); background-color: #f9f9f9;">

                                                                    <!-- Modal Header with bold title and cleaner button -->
                                                                    <div class="modal-header" style="background-color: #007bff; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 15px;">
                                                                        <h5 class="modal-title" id="complaintDetailsModalLabel" style="font-weight: 700; font-size: 1.4em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                                                            📋 Outpass Details
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; font-size: 1.2em;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <!-- Modal Body with reduced padding -->
                                                                    <div class="modal-body" style="padding: 15px; font-size: 1.1em; color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

                                                                        <!-- Complaint Info Section with minimized spacing -->
                                                                        <ol class="list-group list-group-numbered" style="margin-bottom: 0;">
                                                                            <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                                                <div class="ms-2 me-auto">
                                                                                    <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Category Of Pass</div>
                                                                                    <b><?php echo $row['category']; ?></b>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                                                <div class="ms-2 me-auto">
                                                                                    <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Date</div>
                                                                                    <b><?php echo $row['date']; ?></b>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                                                <div class="ms-2 me-auto">
                                                                                    <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Reason For leave College</div>
                                                                                    <b><?php echo $row['reason']; ?></b>
                                                                                </div>
                                                                            </li>




                                                                        </ol>
                                                                    </div>

                                                                    <!-- Modal Footer with reduced padding -->
                                                                    <div class="modal-footer" style="border-top: none; justify-content: center; padding: 10px;">
                                                                        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="border-radius: 25px; padding: 10px 30px; font-size: 1.1em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                                                            Close
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Action column -->
                                                        <td class="text-center">
                                                            <?php if (($row['status'] == 1) || ($row['status'] == 5) || ($row['status'] == 6)) { ?>
                                                                <span class="badge bg-danger text-white" style="font-size: 1.2em;"><?php echo $statusMessage; ?></span>

                                                                </button>
                                                            <?php } else { ?>
                                                                <span class="badge bg-success text-white" style="font-size: 1.5em;"><?php echo $statusMessage; ?></span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $s++;
                                                    $app++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                                            }

                                            // Close the database connection
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

        </div>
        <footer class="footer text-center">
            <p>the mic out</p>
        </footer>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Out Pass Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">

                    <form id="outPassForm">

                        <div class="mb-3">
                            <input type="hidden" id="hidden_user_id" value="<?php echo $_SESSION['reg_no']; ?>">
                            <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $_SESSION['reg_no']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="outPass" class="form-label">Out Pass</label>
                            <select class="form-select form-select-lg mb-3 form-control" id="outPass" aria-label="Large select example">
                                <option selected>Select Below</option>
                                <option value="Emergency Pass">Emergency Pass</option>
                                <option value="General Pass">General Pass</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="time" name="time" required>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter your reason for leave college" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inform" class="form-label">Send Notification to mentor</label>
                            <!-- Button to trigger the JavaScript function -->
                            <button type="button" class="btn btn-success" onclick="informMentor()">Tap to inform</button>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(function() {
            // Initialize the tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // You can also set options manually if needed
            $('.viewcomplaint').tooltip({
                placement: 'top',
                title: 'View'
            });
        });
        $(document).ready(function() {
            $('#addnewtask').DataTable();
        });

        $(document).on('submit', '#outPassForm', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("save_newuser", true);
            formData.append("outPass", $('#outPass').val());
            formData.append("time", $('#time').val());
            formData.append("reason", $('#reason').val());

            $.ajax({
                type: "POST",
                url: "back.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res);
                    if (res.status == 200) {
                        swal("Outpass Applied", "", "success");
                        $('#exampleModal').modal('hide');
                        $('#outPassForm')[0].reset();
                        $('#addnewtask').load(location.href + " #addnewtask");

                    } else if (res.status == 500) {
                        $('#exampleModal').modal('hide');
                        $('#outPassForm')[0].reset();
                        alert("Something went wrong! Please try again.");
                        console.error("Error:", res.message);
                    }
                }
            });
        });

        function informMentor() {
            var mentorPhone = "<?php echo $mentor; ?>"; // Get the mentor's phone number
            var message = "Your <?php echo $name; ?> has applied for an outpass. This is an automated message sent via WhatsApp.";

            // Encode the message properly
            var encodedMessage = encodeURIComponent(message);

            var url = "https://api.whatsapp.com/send/?phone=91" + mentorPhone + "&text=" + encodedMessage;

            // Open WhatsApp link in a new tab
            window.open(url, "_blank");
        }
    </script>

</body>

</html>