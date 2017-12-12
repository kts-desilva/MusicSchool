<?php
require_once 'dbConnection.php';


/*insert values to database*/

$mod_id = $_POST['module_id'];
$mod_name = $_POST['name'];
$descript = $_POST['descript'];
$mod_type = $_POST['types'];
	

$query = "INSERT INTO course (course_id, course_name, type, description) VALUES
('$mod_id', '$mod_name','$mod_type', '$descript')";
$result = mysql_query($query);
if(!empty($result)) {
	$error_message = "";
	$success_message = "You have created new module successfully!";	
	echo $success_message;
} else {
	$error_message = "Problem in Module Creation. Try Again!";
	echo $error_message;
}

?>