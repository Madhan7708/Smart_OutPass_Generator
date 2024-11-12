<?php
include("db.php");
//Pending tab code
$query = "SELECT student.name,student.user_id,student.images, leaveapply.* from student JOIN leaveapply ON student.user_id=leaveapply.user_id WHERE status = '3' ";
$result = mysqli_query($conn, $query);




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

    <title>Smart Outpass Management System - Security Dashboard</title>
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

        <header class="topbar" data-navbarbg="skin5" style="background:#25476a;">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <b class="logo-icon p-l-8">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                        </span>

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

        <aside class="left-sidebar" data-sidebarbg="skin5"  style="background:#25476a;">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30" style="background:#25476a;">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="gate.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Gate Approval</span></a></li>


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

                <div class="card" style="margin-top: 20px;">
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">


                        <div class="card">
                            <div class="card-body" style="padding: 10px;">
                                <!-- Nav tabs -->
                                

                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <!-- Completed Work Tab -->
                                    <div class="tab-pane active" id="pending" role="tabpanel">
                                        <div class="p-20">
                                            <div class="table-responsive">
                                                <div class="card">
                                                    <div class="card-body" style="padding: 10px;">
                                                        <table id="addnewtask" class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">
                                                                        <h5>S.No</h5>
                                                                    </th>
                                                                    <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">
                                                                        <h5>Reg.No</h5>
                                                                    </th>
                                                                    <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">
                                                                        <h5>Name</h5>
                                                                    </th>
                                                                    <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">
                                                                        <h5>Student Images</h5>
                                                                    </th>
                                                                    <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">
                                                                        <h5>OutPass Details</h5>
                                                                    </th>
                                                                    <th class="text-center" style="background:linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color:white;">
                                                                        <h5>Action</h5>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $s = 1;
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $s; ?></td>
                                                                        <td><?php echo $row['user_id']; ?></td>
                                                                        <td><?php echo $row['name']; ?></td>
                                                                        <td><center><img src="uploads/<?php echo $row['images'] ?>" alt="text" style="height:100px; width:100px;"></center></td>

                                                                        <td class="text-center">
                                                                            <button type="button" class="btn viewcomplaint" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" style="font-size: 25px;">
                                                                                <i class="fas fa-eye"></i>
                                                                            </button>
                                                                        </td>

                                                                        <!-- Modal for Outpass Details -->
                                                                        <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="complaintDetailsModalLabel" aria-hidden="true">
                                                                             <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                                                <div class="modal-content" style="border-radius: 8px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); background-color: #f9f9f9;">
                                                                                    <div class="modal-header" style="background-color: #007bff; color: white; padding: 15px;">
                                                                                        <h5 class="modal-title" id="complaintDetailsModalLabel" style="font-weight: 700;">📋 Outpass Details</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body" style="padding: 15px; color: #333;">
                                                                                        <ol class="list-group list-group-numbered">
                                                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                                                <div class="ms-2 me-auto">
                                                                                                    <div class="fw-bold" style="color: #007bff;">Category Of Pass</div>
                                                                                                    <b><?php echo $row['category']; ?></b>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                                                <div class="ms-2 me-auto">
                                                                                                    <div class="fw-bold" style="color: #007bff;">Date</div>
                                                                                                    <b><?php echo $row['date']; ?></b>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                                                <div class="ms-2 me-auto">
                                                                                                    <div class="fw-bold" style="color: #007bff;">Reason For Leaving College</div>
                                                                                                    <b><?php echo $row['reason']; ?></b>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ol>
                                                                                    </div>
                                                                                    <div class="modal-footer" style="justify-content: center;">
                                                                                        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <td>
                                                                            <center><button type="button" value="<?php echo $row['id']; ?> " class="btn btn-success userapprove text-center" style="font-size: 1.2em;">OUT</button></center>

                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                    $s++;
                                                                };
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

                        </div>

                    </div>
                </div>




            </div>

        </div>
        <footer class="footer text-center">
                <p>Smart Outpass Management System</p>
            </footer>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

        $(document).on('click', '.userapprove', function(e) {
            e.preventDefault();
            var id = $(this).val();
            console.log(id);
            if (confirm('Are you sure you want to approve the User ?')) {

                $.ajax({
                    type: "POST",
                    url: "back.php",
                    data: {
                        'update_status': true,
                        'ids': id
                    },
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 500) {
                            alert(res.message);
                        } else {
                            Swal.fire({
                                title: "Success",
                                text: "User Out",
                                icon: "success"
                            });
                            $('#addnewtask').load(location.href + " #addnewtask");

                            $('#addnewtask').DataTable().destroy();

                            $("#addnewtask").load(location.href + " #addnewtask > *", function() {
                                // Reinitialize the DataTable after the content is loaded
                                $('#addnewtask').DataTable();
                            });
                        }
                    }
                })
            }


        })

       
    </script>

</body>

</html>