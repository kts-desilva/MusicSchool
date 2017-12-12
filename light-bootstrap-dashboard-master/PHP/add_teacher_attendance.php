<?php
require_once 'connection.php';

function addAttendance(){
	$leavingTime=$_POST['leavingTime'];
	$arrivalTime=$_POST['arrivalTime'];
	$dates=$_POST['dates'];
	$teacherName=$_POST['teacherName'];
	$teacherId=$_POST['teacherId'];

	$query_check = "SELECT * FROM teacher WHERE teacher_id ='$teacherId' ";
    $result = runQuery($query_check);
    if (mysqli_num_rows($result) == 1) {

        $query_store = "INSERT INTO teacher_attendance values ('$teacherId','$dates','$arrivalTime','$leavingTime')";
        $save = runQuery($query_store);

        if($save){
            echo 'ok';
        }else{
            echo 'wrong';
        }
    }else{
        echo 'wrong';
    }

}


$action = $_POST['action'];
//$action='update';
if ($action=='addAttendance'){
    addAttendance();
} 
 ?>