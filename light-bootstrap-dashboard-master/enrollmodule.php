<?php
include("php/dbconnect.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Teacher - Dashboard</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

        <!--   Core JS Files   -->
            <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
            <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

            <!--  Checkbox, Radio & Switch Plugins -->
            <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

            <!--  Charts Plugin -->
            <script src="assets/js/chartist.min.js"></script>

            <!--  Notifications Plugin    -->
            <script src="assets/js/bootstrap-notify.js"></script>

            <!--  Google Maps Plugin    -->
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

            <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
            <script src="assets/js/light-bootstrap-dashboard.js"></script>

            <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
            <script src="assets/js/demo.js"></script>


</head>
<body>
<div class="wrapper">
<div class="sidebar" data-color="blue" data-image="assets/img/yeonsei.png">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text" id="heading">
                    Clerk Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="teacher_dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard*</p>
                    </a>
                </li>
                <li>
                    <a href="clerk_user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile*</p>
                    </a>
                </li>
                <li>
                    <a href="clerk_student.html">
                        <i class="pe-7s-note2"></i>
                        <p>Student Registartion</p>
                    </a>
                </li>
                <li>
                    <a href="clerk_student_attendance.html">
                        <i class="pe-7s-users"></i>
                        <p>Student Attendance</p>
                    </a>
                </li>
                <li class="active">
                    <a href="bew.php">
                        <i class="pe-7s-cash"></i>
                        <p>Module Enrollment </p>
                    </a>
                </li>
                <li>
                    <a href="clerk_teacher_payment.html">
                        <i class="pe-7s-volume"></i>
                        <p>Teacher Payment</p>
                    </a>
                </li>
                <li>
                    <a href="clerk_teacher_attendnce.html">
                        <i class="pe-7s-bell"></i>
                        <p>Teacher Attendance</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Profile</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="">
                                    <p>Account</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>


        <div class="content" id="page-wrapper">
                <div class="container-fluid" id="page-inner">
                <div class="row">
                  <div class="col-md-12">
                      <h2 class="page-head-line">Modules
                  </h2>
                  </div>
                </div>

                <div class="row" style="margin-bottom:20px;">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enroll Student
                        </div>
                        <div class="panel-body">
                            <div class="table-sorting table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Course Name</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Selection</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "select * from course";
                                    $q = $conn->query($sql);
                                    $i=1;
                                    while($r = $q->fetch_assoc())
                                    {

                                        echo '<tr '.(($r['course_id']>0)?'class="danger"':'').'>
                                            <td>'.$r['course_id'].'</td>
                                            <td>'.$r['course_name'] .'</td>
                                            <td>'.$r['type'].'</td>
                                            <td>'.$r['description'].'</td>
                                            <td> <select><option>Group</option><option>Individual</option></select></td>
											<td>			
                      <button type="submit" id="'.$r['course_id'].'" class="btn btn-success btn-xs" onclick="enroll()">Enroll</button>
                                        </tr>';
                                        $i++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- /. ROW  -->
                <div class="row">

                </div>
                <!-- /. ROW  --


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
      Music School | Developed By : <a href="https://github.com/deHasara" target="_blank">Rubik Solutions</a>
    </div>

   <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>


<script type="text/javascript">
    function enroll() {
        var sid='<?php echo $_GET['id'];?>';
        var e = window.event,
            btn = e.target || e.srcElement;
        var cid=btn.id;

        var type=$(btn).parent().prev().children().find(":selected").text();

        var myData = {"SID": sid,"CID":cid,"type":type};
        $.ajax({
            url: "http://localhost/susi/php/enroll.php",
            type: "POST",
            data: myData,
            async: false,
            success: function (res) {
                btn.disabled=true;
                if(res=='ok'){
                    $.notify({
                        icon: 'pe-7s-magic-wand',
                        message: "Enrollment <b>Success</b> !!"
                    },{
                        type: 'success',
                        timer: 500,
                        placement: {
                            from: 'top',
                            align: 'center'
                        }
                    });
                }else{
                    $.notify({
                        icon: 'pe-7s-gleam',
                        message: "Enrollment <b>Fails</b> !!"
                    },{
                        type: 'danger',
                        timer: 500,
                        placement: {
                            from: 'top',
                            align: 'center'
                        }
                    });
                }

            },
            error:function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg+exception);

        }
        });

    }
</script>

</div>
</div>
</body>
</html>
