<?php
include("php/dbconnect.php");

$errormsg = '';
$action = "add";

$id="";
$emailid='';
$sname='';
$joindate = '';
$remark='';
$contact='';
$balance = 0;
$fees='';
$about = '';
$branch='';
$siblingname='';
$siblingid='';
$contactno='';
$birthday='';
$address='';
$parentname='';
$parentcontact='';
$parentemail='';


if(isset($_POST['save']))
{

$sname = mysqli_real_escape_string($conn,$_POST['sname']);
$joindate = mysqli_real_escape_string($conn,$_POST['joindate']);

$contact = mysqli_real_escape_string($conn,$_POST['contact']);
$about = mysqli_real_escape_string($conn,$_POST['about']);
$emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
$branch = mysqli_real_escape_string($conn,$_POST['branch']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$parentname = mysqli_real_escape_string($conn,$_POST['parentname']);
$parentcontact = mysqli_real_escape_string($conn,$_POST['parentcontact']);
$parentemail = mysqli_real_escape_string($conn,$_POST['parentemail']);
$birthday = mysqli_real_escape_string($conn,$_POST['birthday']);

 if($_POST['action']=="add")
 {
 $remark = mysqli_real_escape_string($conn,$_POST['remark']);
 $fees = mysqli_real_escape_string($conn,$_POST['fees']);
 $advancefees = mysqli_real_escape_string($conn,$_POST['advancefees']);
 $balance = $fees-$advancefees;
 $siblingname = mysqli_real_escape_string($conn,$_POST['siblingname']);
 $siblingid = mysql_escape_string($conn,$_POST['siblingid']);


  $q1 = $conn->query("INSERT INTO student (sname,joindate,contact,about,emailid,branch,balance,fees,birthday,address,parentname,parentcontact,parentemail,siblingname,siblingid) VALUES ('$sname','$joindate','$contact','$about','$emailid','$branch','$balance','$fees','$birthday','$address','$parentname','$parentcontact','$parentemail','$siblingname','$siblingid')") ;

$sid = $conn->insert_id;

$conn->query("INSERT INTO  fees_transaction (stdid,paid,submitdate,transcation_remark) VALUES ('$sid','$advancefees','$joindate','$remark')") ;

echo '<script type="text/javascript">window.location="module_registration.php?act=1";</script>';

}else
if($_POST['action']=="update")
{
$id = mysqli_real_escape_string($conn,$_POST['id']);
$sql = $conn->query("UPDATE  student   SET  branch  = '$branch', sname  = '$sname', contact = '$contact', about  = '$about', emailid = '$emailid'  WHERE  id  = '$id'");

echo '<script type="text/javascript">window.location="module_registration.php?act=2";</script>';
}

}

if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("UPDATE  student set delete_status = '1'  WHERE id='".$_GET['id']."'");
header("location: module_registration.php?act=3");

}

$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM student WHERE student_id='".$id."'");
if($sqlEdit->num_rows)
{
$rowsEdit = $sqlEdit->fetch_assoc();
extract($rowsEdit);
$action = "update";
}else
{
$_GET['action']="";
}

}


if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Student Add successfully</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Student Edit successfully</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Student Delete successfully</div>";
}

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

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/yeonsei.png">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text" id="heading">
                    Teacher Tim
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="teacher_dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="teacher_user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="teacher_modules.html">
                        <i class="pe-7s-note2"></i>
                        <p>Modules</p>
                    </a>
                </li>
                <li>
                    <a href="teacher_student.html">
                        <i class="pe-7s-users"></i>
                        <p>Students</p>
                    </a>
                </li>
                <li>
                    <a href="teacher_payment.html">
                        <i class="pe-7s-cash"></i>
                        <p>Payment</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-volume"></i>
                        <p>Announcements</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
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
                        <div class="card">
                            <h4 class="page-head-line">Students
                                <?php
                                echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
                                ' <a href="module_registration.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="module_registration.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
                                ?>

                            </h4>

                            <?php

                            echo $errormsg;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



                <?php
                 if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
                 {
                ?>

        <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-md-12">

                <fieldset class="scheduler-border" >
                    <legend  class="scheduler-border">Search Module:</legend>
                    <form class="form-inline" role="form" id="searchform">
                        <div class="form-group">
                            <label for="email">Name</label>
                            <input type="text" class="form-control" id="student" name="student">
                        </div>

                        <div class="form-group">
                            <label for="email"> Date Of Joining </label>
                            <input type="text" class="form-control" id="doj" name="doj" >
                        </div>

                        <div class="form-group">
                            <label for="email"> Module </label>
                            <select  class="form-control" id="branch" name="branch" >
                                <option value="" >Select Module</option>
                                <?php
                                                        $sql = "select * from branch where delete_status='0' order by branch.branch asc";
                                                        $q = $conn->query($sql);

                                while($r = $q->fetch_assoc())
                                {
                                echo '<option value="'.$r['id'].'"  '.(($branch==$r['id'])?'selected="selected"':'').'>'.$r['branch'].'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <button type="button" class="btn btn-success btn-sm" id="find" > Find </button>
                        <button type="reset" class="btn btn-danger btn-sm" id="clear" > Clear </button>
                    </form>
                </fieldset>


            </div>
        </div>

        <script type="text/javascript">

            $( document ).ready( function () {

                $( "#joindate" ).datepicker({
                    dateFormat:"yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1970:<?php echo date('Y');?>"
                });

                $( "#birthday" ).datepicker({
                    dateFormat:"yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1970:<?php echo date('Y');?>"
                });



                if($("#signupForm1").length > 0)
                {

                <?php if($action=='add')
                {
                        ?>

                    $( "#signupForm1" ).validate( {
                        rules: {
                            sname: "required",
                            joindate: "required",
                            emailid: "email",
                            branch: "required",
                            birthday: "required",
                            address: "required",
                            parentname: "required",
                            parentcontact: "required",


                            contact: {
                                required: true,
                                digits: true
                            },

                            fees: {
                                required: true,
                                digits: true
                            },


                            advancefees: {
                                required: true,
                                digits: true
                            },


                        },
                    <?php
                }else
                    {
                            ?>

                        $.( "#signupForm1" ).validate( {
                            rules: {
                                sname: "required",
                                joindate: "required",
                                emailid: "email",
                                branch: "required",


                                contact: {
                                    required: true,
                                    digits: true
                                }

                            },



                        <?php
                    }
                            ?>

                        errorElement: "em",
                            errorPlacement: function ( error, element ) {
                        // Add the `help-block` class to the error element
                        error.addClass( "help-block" );

                        // Add `has-feedback` class to the parent div.form-group
                        // in order to add icons to inputs
                        element.parents( ".col-sm-10" ).addClass( "has-feedback" );

                        if ( element.prop( "type" ) === "checkbox" ) {
                            error.insertAfter( element.parent( "label" ) );
                        } else {
                            error.insertAfter( element );
                        }

                        // Add the span element, if doesn't exists, and apply the icon classes to it.
                        if ( !element.next( "span" )[ 0 ] ) {
                            $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
                        }
                    },
                        success: function ( label, element ) {
                            // Add the span element, if doesn't exists, and apply the icon classes to it.
                            if ( !$( element ).next( "span" )[ 0 ] ) {
                                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
                            }
                        },
                        highlight: function ( element, errorClass, validClass ) {
                            $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
                            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                        },
                        unhighlight: function ( element, errorClass, validClass ) {
                            $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
                            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                        }
                    } );

                }

                } );



            $("#fees").keyup( function(){
                $("#advancefees").val("");
                $("#balance").val(0);
                var fee = $.trim($(this).val());
                if( fee!='' && !isNaN(fee))
                {
                    $("#advancefees").removeAttr("readonly");
                    $("#balance").val(fee);
                    $('#advancefees').rules("add", {
                        max: parseInt(fee)
                    });

                }
                else{
                    $("#advancefees").attr("readonly","readonly");
                }

            });

            $("#advancefees").keyup( function(){

                var advancefees = parseInt($.trim($(this).val()));
                var totalfee = parseInt($("#fees").val());
                if( advancefees!='' && !isNaN(advancefees) && advancefees<=totalfee)
                {
                    var balance = totalfee-advancefees;
                    $("#balance").val(balance);

                }
                else{
                    $("#balance").val(totalfee);
                }

            });


        </script>

                <?php
		}else{
		?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Enroll Student</h4>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="tSortable22">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Birthday</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                            <?php
									$sql = "select * from student where delete_status='0'";
									$q = $conn->query($sql);
                                            $i=1;
                                            while($r = $q->fetch_assoc())
                                            {

                                            echo '<tr '.(($r['student_id']>0)?'class="danger"':'').'>
                                            <td>'.$r['student_id'].'</td>
                                            <td>'.$r['first_name'] .' '.$r['last_name'].'</td>
                                            <td>'.date("d M y", strtotime($r['birthday'])).'</td>
                                            <td>'.$r['address'].'</td>
                                            <td>'.$r['email'].'</td>
                                            <td>
                                                <a href="enrollmodule.php?action=edit&id='.$r['student_id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                                                </tr>';
                                                $i++;
                                                }
                                                ?>
                                            </td>
                                            </tr>
                                            </tbody>';
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
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
</html>
