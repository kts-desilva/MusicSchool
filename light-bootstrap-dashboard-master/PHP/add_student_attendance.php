<?php
require_once 'dbConnection.php';

function addAttendance(){
	$arrivalTime=$_POST['arrivalTime'];
	$dates=$_POST['dates'];
	$studentId=$_POST['studentId'];

	$query_check = "SELECT student_id FROM student WHERE student_id ='$studentId' ";
    $result = mysql_query($query_check);
    if ($result) {
        $query_store = "INSERT INTO student_attendance values ('$studentId','$dates','$arrivalTime')";
        $save = mysql_query($query_store);

        if($save){
            echo 'ok';
        }else{
            echo 'no insert:wrong';
        }
    }else{
        echo 'no user:wrong';
    }

}

$action = $_POST['action'];
//$action='update';
if ($action=='addAttendance'){
    addAttendance();
}
 ?>