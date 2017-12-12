<?php
$con = mysql_connect("localhost", "root", NULL);
mysql_select_db("ms");

if (!$con) {
    die("Connect faild" . mysqli_connect_error());
}

$sid=$_POST["SID"];
$cid=$_POST["CID"];
$type=$_POST["type"];

$sql="select class_id from class where course_id='$cid' and class_type='$type'";
$q = mysql_query($sql);

$r = mysql_fetch_array($q);
$class_id=$r['class_id'];

$sql="insert into takes(course_id,class_id,student_id,instrument_id) values ('$cid','$class_id','$sid','I001')";
$q1 = mysql_query($sql);

if ($q1){
    echo 'ok';
}else{
    echo 'wrong';
}

?>