<?php
require_once 'dbConnection.php';


/*insert values to database*/

$first_name = $_POST['first'];
$last_name = $_POST['last'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['pass'];
$salary = $_POST['salary'];
$tech_id = $_POST['id'];
$birthday = $_POST['birthday'];


$query = "INSERT INTO teacher (first_name, last_name, email, gender, birthday, phone_no, address,basic_salary, teacher_id) VALUES
('$first_name', '$last_name','$email', '$gender', '$birthday', '$phone_no', '$address','$salary', '$tech_id')";

$query2 = "INSERT INTO user values('$tech_id', '$password','Teacher')";
$result = mysql_query($query);
$result2 = mysql_query($query2);

echo $result;
echo $result2;
if($result and $result2) {
    $error_message = "";
    $success_message = "New Teacher has been registered successfully!";
    echo $success_message;
} else {
    $error_message = "Problem in registration. Try Again!";
    echo $error_message;
}


?>