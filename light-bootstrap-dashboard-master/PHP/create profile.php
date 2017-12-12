<?php
require_once 'dbConnection.php';

/* Password Matching Validation */
if($_POST['pass'] != $_POST['confirmpass']){ 
$error_message = 'Passwords should be same<br>';
echo $error_message;
}
/*insert values to database*/
	
$first_name = $_POST['first'];
$last_name = $_POST['last'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['pass'];
$birthday = $_POST['birthday'];
$pass = $_POST['pass'];
$id=$_POST['id'];

$query = "INSERT INTO admin (admin_id,first_name, last_name, email, gender, birthday, phone_no, address) VALUES ('$id','$first_name', '$last_name','$email', '$gender', '$birthday', '$phone_no', '$address')";
$query2 = "INSERT INTO user values('$id', '$pass','Admin')";
$result = mysql_query($query);
$result2 = mysql_query($query2);

if($result and $result2) {
    $error_message = "";
    $success_message = "Admin profile has been upadated successfully!";
    echo $success_message;
} else {
    $error_message = "Problem in admin update. Try Again!";
    echo $error_message;
}

?>